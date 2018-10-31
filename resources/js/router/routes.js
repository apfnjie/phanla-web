const Welcome = () => import("~/pages/home").then(m => m.default || m);
const Login = () => import("~/pages/auth/login").then(m => m.default || m);
const Register = () =>
  import("~/pages/auth/register").then(m => m.default || m);
const PasswordEmail = () =>
  import("~/pages/auth/password/email").then(m => m.default || m);
const PasswordReset = () =>
  import("~/pages/auth/password/reset").then(m => m.default || m);
const NotFound = () => import("~/pages/errors/404").then(m => m.default || m);

const Home = () => import("~/pages/home").then(m => m.default || m);
const Settings = () =>
  import("~/pages/settings/index").then(m => m.default || m);
const SettingsProfile = () =>
  import("~/pages/settings/profile").then(m => m.default || m);
const SettingsPassword = () =>
  import("~/pages/settings/password").then(m => m.default || m);

const Event = () => import("~/pages/events/index").then(m => m.default || m);
const EventsAll = () => import("~/pages/events/all").then(m => m.default || m);
const EventCreate = () =>
  import("~/pages/events/create").then(m => m.default || m);
const EventView = () => import("~/pages/events/view").then(m => m.default || m);
const EventEdit = () => import("~/pages/events/edit").then(m => m.default || m);
const EventDelete = () =>
  import("~/pages/events/delete").then(m => m.default || m);

const Categories = () =>
  import("~/pages/categories/index").then(m => m.default || m);
const CategoriesAll = () =>
  import("~/pages/categories/all").then(m => m.default || m);
const CategoryCreate = () =>
  import("~/pages/categories/create").then(m => m.default || m);
const CategoryEdit = () =>
  import("~/pages/categories/edit").then(m => m.default || m);
const CategoryDelete = () =>
  import("~/pages/categories/delete").then(m => m.default || m);

export default [
  { path: "/", name: "welcome", component: Welcome },

  { path: "/login", name: "login", component: Login },
  { path: "/register", name: "register", component: Register },
  {
    path: "/password/reset",
    name: "password.request",
    component: PasswordEmail
  },
  {
    path: "/password/reset/:token",
    name: "password.reset",
    component: PasswordReset
  },

  { path: "/home", name: "home", component: Home },
  {
    path: "/settings",
    component: Settings,
    children: [
      { path: "", redirect: { name: "settings.profile" } },
      { path: "profile", name: "settings.profile", component: SettingsProfile },
      {
        path: "password",
        name: "settings.password",
        component: SettingsPassword
      }
    ]
  },
  {
    path: "/events",
    component: Event,
    children: [
      { path: "", name: "events.all", component: EventsAll },
      { path: "create", name: "events.create", component: EventCreate },
      { path: ":event", name: "events.view", component: EventView },
      { path: ":event/edit", name: "events.edit", component: EventEdit },
      { path: ":event/delete", name: "events.delete", component: EventDelete }
    ]
  },

  {
    path: "/categories",
    component: Categories,
    children: [
      { path: "", name: "categories.all", component: CategoriesAll },
      { path: "create", name: "categories.create", component: CategoryCreate },
      {
        path: ":category/edit",
        name: "categories.edit",
        component: CategoryEdit
      },
      {
        path: ":category/delete",
        name: "categories.delete",
        component: CategoryDelete
      }
    ]
  },

  { path: "*", component: NotFound }
];
