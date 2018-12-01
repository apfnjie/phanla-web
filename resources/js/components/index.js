import Vue from "vue";
import Success from './Success';
import Card from "./Card";
import Child from "./Child";
import Button from "./Button";
import Checkbox from "./Checkbox";
import Pagination from "./Pagination";
import { HasError, AlertError, AlertSuccess } from "vform";

// Components that are registered globaly.
[
  Card,
  Child,
  Button,
  Checkbox,
  HasError,
  AlertError,
  AlertSuccess,
  Success,
  Pagination
].forEach(Component => {
  Vue.component(Component.name, Component);
});
