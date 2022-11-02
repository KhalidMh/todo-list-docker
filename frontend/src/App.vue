<template>
  <div>
    <div class="todoListContainer">
      <div class="heading">
        <h2 id="title">Todo List</h2>
        <add-item-form @itemChanged="getItems()" />
      </div>
      <list-view :items="items" @reloadList="getItems()" />
    </div>
  </div>
</template>

<script>
import addItemForm from "./components/addItemForm";
import listView from "./components/listView";
// import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

export default {
  components: {
    addItemForm,
    listView,
    // FontAwesomeIcon,
  },
  data: function () {
    return {
      items: [],
    };
  },
  methods: {
    getItems() {
      this.axios
        .get("http://localhost/api/items")
        .then((res) => {
          this.items = res.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
  created() {
    this.getItems();
  },
};
</script>

<style scoped>
.todoListContainer {
  width: 350px;
  margin: 0 auto;
  box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
    rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}

.heading {
  background-color: #e6e6e6;
  padding: 10px;
}

#title {
  text-align: center;
}
</style>