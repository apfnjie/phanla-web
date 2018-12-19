<template>
  <div class="bg-grey-lighter py-20">
    <div class="container">
      <div class="row mb-10">
        <div class="col-md-8 m-auto">
          <div class="flex">
            <input
              type="text"
              class="appearance-none border rounded w-full py-4 px-4 text-grey-darker leading-tight focus:outline-none focus:shadow"
            >
            
            <button
              class="form-button btn-secondary bg-accent rounded-l-none px-4"
              @click.prevent="showAddForm"
            >
              <fa icon="plus-square" fixed-width/>
            </button>
          </div>
        </div>
      </div>

      <div v-if="deleteForm" class="row">
        <div class="col-md-12 flex flex-wrap mb-6 bg-white py-4">
          <div class="w-full mb-3 px-3">
            <h5 class="font-bold uppercase">Delete Privilege</h5>
          </div>
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label
              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
              for="grid-first-name"
            >User</label>
            <div class="relative">
              <input
                :value="deletePrivilege.user.name"
                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                disabled
              >
            </div>
          </div>
          <div class="w-full md:w-1/2 px-3">
            <label
              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
              for="grid-last-name"
            >Role</label>
            <div class="relative">
              <input
                :value="deletePrivilege.role.name"
                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                disabled
              >
            </div>
          </div>

          <div class="mt-4 flex w-full px-3">
            <button class="bg-red p-3 px-4 rounded text-white" @click="destroy">Delete</button>
            <button
              class="bg-grey-lighter p-3 px-4 rounded text-accent ml-4"
              @click.prevent="hideDeleteForm"
            >Cancel</button>
          </div>
        </div>
      </div>

      <div v-if="add" class="row">
        <form @submit.prevent="store" class="col-md-12 flex flex-wrap mb-6 bg-white py-4">
          <div class="w-full mb-3 px-3">
            <h5 class="font-bold uppercase">Add Privilege</h5>
          </div>
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 flex-col">
            <label
              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
              for="grid-first-name"
            >User</label>
            <div class="relative">
              <select
                v-model="form.user_id"
                class="block appearance-none w-full bg-white border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
              >
                <option v-for="(data, index) in users" :key="index" :value="data.id">{{data.name}}</option>
              </select>
            </div>
            <has-error class="block" :form="form" field="user_id"/>
          </div>

          <div class="w-full md:w-1/2 px-3">
            <label
              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
              for="grid-last-name"
            >Role</label>
            <div class="relative">
              <select
                v-model="form.role"
                class="block appearance-none w-full bg-white border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
              >
                <option value="1">Approver</option>
                <option value="2">Administrator</option>
              </select>
              <has-error :form="form" field="role"/>
            </div>
          </div>

          <div class="mt-4 flex w-full px-3">
            <v-button :loading="form.busy" class="p-3 px-4 rounded text-white">Submit</v-button>
            <button
              class="bg-grey-lighter p-3 px-4 rounded text-accent ml-4"
              @click.prevent="hideAddForm"
            >Cancel</button>
          </div>
        </form>
      </div>

      <div class="row">
        <div v-for="(data, index) in privileges" :key="index" class="col-md-12 bg-white p-4 mb-3">
          <div class="flex">
            <div class="flex-1">
              <span class="font-bold">{{data.user.name}}</span>
            </div>

            <div class="flex-1">
              <span>
                {{data.role.name}} -
                <span
                  class="text-blue-light text-sm uppercase"
                >Created @ {{data.created_at}}</span>
              </span>
            </div>

            <div class="flex-shrink">
              <button class="bg-red p-2 text-white rounded" @click="showDeleteForm(data)">
                <fa icon="trash" fixed-width/>
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-12 mt-3">
          <pagination
            class="float-md-right"
            :pagination="pagination"
            @paginate="index()"
            :offset="4"
          ></pagination>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";
import Form from "vform";
export default {
  metaInfo() {
    return {
      title: "Privileges"
    };
  },

  middleware: ["auth", "admin"],

  data() {
    return {
      add: false,
      deleteForm: false,
      users: [],
      form: new Form({
        user_id: "",
        role: 1
      }),
      privileges: [],
      pagination: {
        current_page: 1
      },
      deletePrivilege: {}
    };
  },

  created() {
    this.index();
    axios.get("/api/users?all").then(response => {
      const { data, status } = response;
      console.log("Users", data, status);
      this.users = data.data;
    });
  },

  methods: {
    async index() {
      axios
        .get("/api/privileges?page=" + this.pagination.current_page, {
          params: {
            user: this.filter_user
          }
        })
        .then(response => {
          const { data, status } = response;
          this.privileges = data.data;
          this.pagination = data.meta;
          console.log("Privileges", data, status);
        });
    },

    async store() {
      const { data, status } = await this.form.post("/api/privileges");
      console.log("Add Privilege", data, status);
      window.scrollTo(0, 0);
      this.add = false;
      this.index();
    },

    async destroy() {
      const { data, status } = await axios.delete(
        "/api/privileges/" + this.deletePrivilege.id
      );
      console.log("Delete Privilege", data, status);
      window.scrollTo(0, 0);
      this.deleteForm = false;
      this.index();
    },

    showAddForm() {
      this.add = true;
      window.scrollTo(0, 0);
    },

    hideAddForm() {
      this.add = false;
    },

    showDeleteForm(data) {
      this.deleteForm = true;
      this.deletePrivilege = data;
      window.scrollTo(0, 0);
    },

    hideDeleteForm() {
      this.deleteForm = false;
    }
  }
};
</script>
