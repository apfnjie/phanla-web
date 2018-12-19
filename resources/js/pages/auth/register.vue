<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 m-auto">
        <div class="bg-white px-5 pt-16 pb-8 mb-4">
          <h4 class="text-accent text-center mb-4">Create Account</h4>
          <form @submit.prevent="register" @keydown="form.onKeydown($event)">
            <!-- Name -->
            <div class="form-group mb-4">
              <label class="block text-accent text-sm mb-2">{{ $t('name') }}</label>
              <input
                v-model="form.name"
                :class="{ 'is-invalid': form.errors.has('name') }"
                class="form-control"
                type="text"
                name="name"
              >
              <has-error :form="form" field="name"/>
            </div>

            <!-- Email -->
            <div class="form-group mb-4">
              <label class="block text-accent text-sm mb-2">{{ $t('email') }}</label>
              <input
                v-model="form.email"
                :class="{ 'is-invalid': form.errors.has('email') }"
                class="form-control"
                type="email"
                name="email"
              >
              <has-error :form="form" field="email"/>
            </div>

            <!-- Password -->
            <div class="form-group mb-4">
              <label class="block text-accent text-sm mb-2">{{ $t('password') }}</label>
              <input
                v-model="form.password"
                :class="{ 'is-invalid': form.errors.has('password') }"
                class="form-control"
                type="password"
                name="password"
              >
              <has-error :form="form" field="password"/>
            </div>

            <!-- Email -->
            <div class="form-group mb-4">
              <label class="block text-accent text-sm mb-2">{{ $t('confirm_password') }}</label>
              <input
                v-model="form.password_confirmation"
                :class="{ 'is-invalid': form.errors.has('password_confirmation') }"
                class="form-control"
                type="password"
                name="password_confirmation"
              >
              <has-error :form="form" field="password_confirmation"/>
            </div>

            <div class="flex items-center justify-between">
              <v-button
                :loading="form.busy"
                class="btn-block btn-primary"
                type="button"
              >Create Account</v-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Form from "vform";
import LoginWithGithub from "~/components/LoginWithGithub";

export default {
  middleware: "guest",

  layout: "basic",

  components: {
    LoginWithGithub
  },

  metaInfo() {
    return {
      title: this.$t("register")
    };
  },

  data: () => ({
    form: new Form({
      name: "",
      email: "",
      password: "",
      password_confirmation: ""
    })
  }),

  methods: {
    async register() {
      // Register the user.
      const { data } = await this.form.post("/api/register");

      // Log in the user.
      const {
        data: { token }
      } = await this.form.post("/api/login");

      // Save the token.
      this.$store.dispatch("auth/saveToken", {
        token
      });

      // Update the user.
      await this.$store.dispatch("auth/updateUser", {
        user: data
      });

      // Redirect home.
      this.$router.push({
        name: "home"
      });
    }
  }
};
</script>
