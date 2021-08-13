<template>
    <div>
        <div class="jumbotron">
            <h5 class="display-4">Edit {{this.movie.title}}</h5>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateMovie">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="movie.title" >
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="5" type="text" class="form-control" v-model="movie.description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <input type="number" class="form-control" v-model="movie.year" min="1900" max="2021">
                    </div>
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="number" class="form-control" v-model="movie.rank" min="1" max="5">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                movie: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/movies/${this.$route.params.id}`)
                .then((res) => {
                    this.movie = res.data;
                });
        },
        methods: {
            updateMovie() {
                this.axios
                    .put(`http://localhost:8000/api/movies/${this.$route.params.id}`, this.movie)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>