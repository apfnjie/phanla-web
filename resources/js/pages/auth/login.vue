<template>
<div class="container">
  <div class="row">
    <div class="col-md-5 m-auto">

      <div class="bg-white px-5 pt-16 pb-8 mb-4">
        <h5 class="text-accent text-center mb-4">Enter your credentials</h5>
        <form @submit.prevent="login" @keydown="form.onKeydown($event)">
          <!-- Email -->
          <div class="form-group mb-4">
            <label class="block text-accent text-sm mb-2">{{ $t('email') }}</label>
            <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
            <has-error :form="form" field="email" />
          </div>

          <!-- Password -->
          <div class="form-group mb-4">
            <label class="block text-accent text-sm mb-2">{{ $t('password') }}</label>
            <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
            <has-error :form="form" field="password" />
          </div>

          <div class="flex items-center justify-between">
            <v-button :loading="form.busy" class="btn-block btn-primary" type="button">Sign In</v-button>
          </div>
        </form>
        <!-- </div> -->
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

  components: {
    LoginWithGithub
  },

  metaInfo() {
    return {
      title: this.$t("login")
    };
  },

  data: () => ({
    form: new Form({
      email: "",
      password: ""
    }),
    remember: false
  }),

  methods: {
    async login() {
      // Submit the form.
      const { data } = await this.form.post("/api/login");

      // Save the token.
      this.$store.dispatch("auth/saveToken", {
        token: data.token,
        remember: this.remember
      });

      // Fetch the user.
      await this.$store.dispatch("auth/fetchUser");

      // Redirect home.
      this.$router.push({
        name: "home"
      });
    }
  }
};
</script>
