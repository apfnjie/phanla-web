<template>
  <nav class="navbar navbar-light navbar-expand-md py-4">
    <div class="container-fluid">
      <router-link :to="{ name: user ? 'home' : 'welcome' }" class="mr-16">
        <img src="../assets/logo.png" alt class width="200">
        <!-- {{ appName }} -->
      </router-link>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarToggler"
        aria-controls="navbarToggler"
        aria-expanded="false"
      >
        <span class="navbar-toggler-icon"/>
      </button>

      <div id="navbarToggler" class="collapse navbar-collapse">
        <ul v-if="user" class="navbar-nav mt-6 md:mt-0 md:mx-6">
          <!-- <locale-dropdown/> -->
          <li class="nav-item md:mx-3">
            <router-link :to="{name: 'events.create'}" class="btn btn-primary rounded-full">
              <fa icon="plus-square" fixed-width/>Create Event
            </router-link>
          </li>
          <li class="nav-item md:mx-3">
            <router-link :to="{name: 'events.all'}" class="nav-link text-accent">Events</router-link>
          </li>
          <li class="nav-item md:mx-3">
            <router-link :to="{name: 'categories.all'}" class="nav-link text-accent">Categories</router-link>
          </li>

          <li class="nav-item md:mx-3">
            <router-link :to="{name: 'privileges'}" class="nav-link text-accent">Privileges</router-link>
          </li>
        </ul>

        <ul v-else class="navbar-nav md:mx-6">
          <li class="nav-item md:mx-3">
            <router-link :to="{name: 'about'}" class="nav-link text-accent">About Us</router-link>
          </li>
          <!-- <li class="nav-item mx-3">
          <router-link :to="{name: 'team'}" class="nav-link text-accent">Our Team</router-link>
          </li>-->
        </ul>

        <ul class="navbar-nav ml-auto">
          <!-- Authenticated -->
          <li v-if="user" class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle text-dark"
              href="#"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <!-- <img :src="user.photo_url" class="rounded-circle profile-photo mr-1"> -->
              {{ user.name }}
            </a>
            <div class="dropdown-menu">
              <router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
                <fa icon="cog" fixed-width/>
                {{ $t('settings') }}
              </router-link>

              <div class="dropdown-divider"/>
              <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
                <fa icon="sign-out-alt" fixed-width/>
                {{ $t('logout') }}
              </a>
            </div>
          </li>
          <!-- Guest -->
          <template v-else>
            <li class="nav-item">
              <router-link
                :to="{ name: 'login' }"
                class="my-2 md:my-0 btn btn-primary font-bold"
              >Sign In</router-link>
            </li>

            <li class="nav-item">
              <router-link
                :to="{ name: 'register' }"
                class="sm:ml-3 my-2 md:my-0 btn btn-outline-info font-bold"
              >Sign Up</router-link>
            </li>
          </template>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from "vuex";
import LocaleDropdown from "./LocaleDropdown";

export default {
  components: {
    LocaleDropdown
  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: "auth/user"
  }),

  methods: {
    async logout() {
      // Log out the user.
      await this.$store.dispatch("auth/logout");

      // Redirect to login.
      this.$router.push({
        name: "login"
      });
    }
  }
};
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -0.375rem 0;
}

.navbar {
  border-bottom-width: 1px;
  -webkit-box-shadow: none;
  box-shadow: none;
}

nav-link {
  color: "grey" !important;
}
</style>
