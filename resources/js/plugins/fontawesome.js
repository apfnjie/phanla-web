import Vue from "vue";
import fontawesome from "@fortawesome/fontawesome";
import FontAwesomeIcon from "@fortawesome/vue-fontawesome";

// import { } from '@fortawesome/fontawesome-free-regular/shakable.es'

import {
  faUser,
  faLock,
  faSignOutAlt,
  faCog,
  faPlusSquare,
  faMapMarkerAlt,
  faCalendarAlt,
  faUserTag,
  faEdit,
  faTrash,
  faPhone,
  faThumbsUp
} from "@fortawesome/fontawesome-free-solid/shakable.es";

import { faEnvelope } from "@fortawesome/fontawesome-free-regular/shakable.es";

import {
  faGithub,
  faFacebookSquare,
  faTwitter,
  faInstagram
} from "@fortawesome/fontawesome-free-brands/shakable.es";

fontawesome.library.add(
  faUser,
  faLock,
  faSignOutAlt,
  faCog,
  faGithub,
  faPlusSquare,
  faMapMarkerAlt,
  faCalendarAlt,
  faUserTag,
  faEdit,
  faTrash,
  faFacebookSquare,
  faTwitter,
  faInstagram,
  faPhone,
  faEnvelope,
  faThumbsUp
);

Vue.component("fa", FontAwesomeIcon);
