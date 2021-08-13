<template>
    <div class="container">
        <div class="jumbotron">
            <h6 class="display-4">Create Movie </h6>
            
        </div>
        <div v-if="this.error" class="alert alert-danger" role="alert">
          Error! Please try again later
        </div>
        <form @submit.prevent="addMovie">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" v-model="movie.title" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea rows="4" type="text" class="form-control" v-model="movie.description" required></textarea>
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="number" class="form-control" v-model="movie.year" min="1900" max="2021" required>
            </div>
            <div class="form-group">
                <label>Rating</label>
                <input type="number" class="form-control" v-model="movie.rank" min="1" max="5" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                movie: {
                    image: 'https://lorempixel.com/80/80/people/'
                },
                error:false
            }
        },
        methods: {
            addMovie() {
                this.axios
                    .post('http://localhost:8000/api/movies', this.movie)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => this.error = true)
                    .finally(() => this.loading = false)
            }
        }
    }
</script>