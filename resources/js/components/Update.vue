<template>
  <div>
    <div class="header-title mt-4">
      <h2 class="header">Create Note</h2>
    </div>
    <div class="section-breadcrumb">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/">Home</router-link>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Create note</li>
        </ol>
      </nav>
    </div>

    <div class="section-input">
      <div class="col-md-12">
        <div class="row justify-content-center">
          <form @submit.prevent="updateData()">
            <div class="title-note">
              <label for class="active">Title Note</label>
              <input
                type="text"
                class="form-control"
                placeholder="Input your title"
                v-model="form.titleNote"
                required
              />
            </div>
            <div class="note mt-3">
              <label for class="active">Note</label>
              <textarea
                class="form-control"
                height="120"
                rows="9"
                cols="30"
                placeholder="Input your Notes"
                v-model="form.note"
                required
              />
            </div>
            <button class="btn btn-primary mt-3 form-control">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        titleNote: "",
        note: ""
      }
    };
  },

  created() {
    //   load data saat pertama kali halaman dibuka
    this.loadData();
  },

  methods: {
    loadData() {
      //   load data berdasarkan id
      axios
        .get("http://127.0.0.1:8000/api/note/" + this.$route.params.id)
        .then(response => {
          // post value yang dari response ke form
          this.form.titleNote = response.data.title_note;
          this.form.note = response.data.note;
        });
    },
    updateData() {
      // put data ke api menggunakan axios
      axios
        .put("http://127.0.0.1:8000/api/note/" + this.$route.params.id, {
          title_note: this.form.titleNote,
          note: this.form.note
        })
        .then(response => {
          //   push router ke read data
          this.$router.push("/");
        });
    }
  }
};
</script>

<style>
</style>
