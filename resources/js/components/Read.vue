<template>
  <div>
    <div class="row mt-4">
      <div class="col-md-10">
        <h2 class="header">Daily Note</h2>
      </div>
      <div class="col-md-2 w-100">
        <router-link to="/create" class="btn btn-primary ml-auto">Add note</router-link>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-4 pb-4" v-for="note in notes" :key="note.id">
        <div class="card" style="width: 20rem; min-height:15rem; max-height:10rem;">
          <div class="card-body">
            <h5 class="card-title">{{note.title_note}}</h5>
            <p class="card-text">{{note.note}}</p>
            <router-link :to="'/detail/'+note.id" class="card-link btn btn-success btn-sm">Edit note</router-link>
            <button class="btn btn-danger btn-sm" v-on:click="deleteData(note.id)">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      //  variable array yang akan menampung hasil fetch dari api
      notes: []
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      //   fetch data dari api menggunakan axios
      axios.get("http://127.0.0.1:8000/api/note").then(response => {
        //   mengirim data hasil fetch ke variable array notes
        this.notes = response.data;
      });
    },
    deleteData(id) {
      // delete data
      axios.delete("http://127.0.0.1:8000/api/note/" + id).then(response => {
        this.loadData();
      });
    }
  }
};
</script>

<style>
</style>
