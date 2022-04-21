// Load vue js
import { createApp, h } from "vue";
import naive from "naive-ui";

const el = document.getElementById("app");

const app = createApp({}).use(naive);

// Reusable
import Example from "./vueComponents/example.vue";
app.component("example", Example);

app.mount(el);
