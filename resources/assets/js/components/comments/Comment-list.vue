<template>
  <div>
    <comment v-for="comment in comments"
              :key="comment.id"
              :comment="comment"
              :data_confirm="data_confirm"
              @deleted="removeComment(comment)">
    </comment>

    <button v-if="endpoint" @click="retrieveComments" :disabled="isLoading" class="btn btn-outline-primary btn-block">
      <i v-if="isLoading" class="fa fa-spinner fa-spin fa-fw"></i>
      {{ loading_comments }}
    </button>
  </div>
</template>

<script>
export default {
  props: ["post_slug", "post_id", "loading_comments", "data_confirm", "api_token"],

  data() {
    return {
      comments: [],
      isLoading: false,
      endpoint: "../api/v1/posts/" + this.post_id + "/comments/?api_token="+this.api_token
    };
  },

  mounted() {
    this.retrieveComments();

    if (window.Echo) {
      Echo.channel("post." + this.post_id)
        .listen(".comment.posted", e => this.addComment(e.comment));
    }

    Event.$on("added", comment => {
      this.addComment(comment);
    });
  },

  methods: {
    retrieveComments() {
      this.isLoading = true;

      axios.get(this.endpoint).then(response => {
        this.comments.push(...response.data.data);
        this.isLoading = false;
        this.endpoint = response.data.links.next;
      });
    },

    addComment(comment) {
      this.comments.unshift(comment);
    },

    removeComment({ id }) {
      this.comments.splice(this.comments.findIndex(comment => comment.id === id), 1)
    }
  }
}
</script>
