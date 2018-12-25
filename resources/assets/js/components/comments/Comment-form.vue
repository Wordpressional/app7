<template>
  <div>
    <div class="form-group">
      <textarea
        class="form-control"
        :class="{ 'is-invalid' : this.errors['content'] }"
        :placeholder="placeholder"
        v-model="content">
      </textarea>

      <span v-if="this.errors['content']" class="invalid-feedback">{{ this.errors['content'][0] }}</span>
    </div>

    <div class="form-group text-right">
      <button class="btn btn-sm align-self-center fa-white st" @click="sendComment" :disabled="this.isDisabled">
        <i v-if="isLoading" class="fa fa-spinner fa-spin fa-fw"></i>
        {{ button }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post_slug", "post_id", "placeholder", "button", "api_token"],

  data() {
    return {
      content: "",
      isLoading: false,
      errors: []
    };
  },

  computed: {
    isDisabled() {
      return this.isLoading || this.content.length === 0;
    }
  },

  methods: {
    sendComment() {
      this.isLoading = true;

      axios
        .post("../api/v1/posts/" + this.post_id + "/comments/?api_token="+this.api_token, {
          content: this.content
        })
        .then(response => {
          Event.$emit("added", response.data.data);

          this.content = "";
          this.isLoading = false;
          this.errors = [];
        })
        .catch(error => {
          this.isLoading = false;
          this.errors = error.response.data.errors;
        });
    }
  }
}
</script>
