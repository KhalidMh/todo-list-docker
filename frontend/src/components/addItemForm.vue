<template>
  <div class="addItem">
    <input type="text" v-model="item.name" />
    <font-awesome-icon
      icon="plus-square"
      @click="addItem()"
      :class="[item.name ? 'active' : 'inactive', 'plus']"
    />
  </div>
</template>

<script>

import { useToast } from "vue-toastification";

export default {
  setup() {
    const toast = useToast();
    return { toast };
  },
  data: function () {
    return {
      item: {
        name: "",
      },
    };
  },
  methods: {
    addItem() {
      if (!this.item.name) return;
      this.axios
        .post("http://localhost/api/items", {
          name: this.item.name,
        })
        .then((res) => {
          console.log(res);
          if ((res.status === 201)) {
            this.$emit("itemChanged");
            this.item.name = "";
            this.toast.success("Item added successfuly!");
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>

<style scoped>
.addItem {
  display: flex;
  justify-content: center;
  align-items: center;
}
input {
  background: #f7f7f7;
  border: 0px;
  outline: none;
  padding: 5px;
  margin-right: 10px;
  width: 100%;
}
.plus {
  font-size: 25px;
  cursor: pointer;
}
.active {
  color: #00ce25;
}
.inactive {
  color: #999999;
}
</style>