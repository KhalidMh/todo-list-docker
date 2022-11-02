<template>
  <div class="item">
    <input type="checkbox" @change="updateCheck()" v-model="finished" />
    <span :class="[finished ? 'completed' : '', 'itemText']">{{
      item.name
    }}</span>
    <button class="trashcan" @click="removeItem()">
      <font-awesome-icon icon="trash" />
    </button>
  </div>
</template>

<script>
import { useToast } from "vue-toastification";
export default {
  props: ["item"],
  setup() {
    const toast = useToast();
    return { toast };
  },
  data() {
    return { finished: this.item.completed };
  },
  methods: {
    removeItem() {
      this.axios
        .delete(`http://localhost/api/items/${this.item.id}`)
        .then((res) => {
          if (res.status == 200) {
            this.$emit("itemChanged");
            this.toast.success("Item deleted successfuly!");
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
    updateCheck() {
      this.axios
        .put(`http://localhost/api/items/${this.item.id}`, {
          completed: true,
        })
        .then((res) => {
          if (res.status == 200) {
            this.$emit("itemChanged");
            this.toast.success("Item set to completed");
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
.completed {
  text-decoration: line-through;
  color: #999;
}
.itemText {
  width: 100%;
  margin-left: 20px;
}
.item {
  display: flex;
  align-items: center;
  justify-content: center;
}
.trashcan {
  background: #e6e6e6;
  border: none;
  color: #ff0000;
  outline: none;
  cursor: pointer;
}
</style>