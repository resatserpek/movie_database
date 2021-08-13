<template>
    <div>
        <div class="jumbotron">
            <h1 class="display-4">Welcome to the Movie Database!</h1>
            <p class="lead">A special movie database where you can create, edit or delete movies in the database</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="/create" role="button">Create New</a>
            </p>
        </div>
        <div class="container-fluid content-row">


            <div class="row "> 
                <h6 v-if="movies.length == 0" class="text-center">No movies in database, please add movies</h6>
                <div class="col-sm-12"  v-for="movie in movies" :key="movie.id">
                    <div class="card flex-row" > 

                    <img class="card-img-left" :src="movie.image" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ movie.title }}</h5>
                        <p class="card-text"> {{movie.description}}</p>
                        <p class="card-text"><small class="text-muted">Rating: {{movie.rank}} / 5 </small></p>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'edit', params: { id: movie.id }}" class="btn btn-success">Edit</router-link>
                            <button class="btn btn-danger" @click="deleteMovie(movie.id)">Delete</button>
                        </div>

                    </div>
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
                movies: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/movies/')
                .then(response => {
                    this.movies = response.data.data;
                });
        },
        methods: {
            deleteMovie(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/movies/${id}`)
                    .then(response => {
                        
                        let i = this.movies.map(data => data.id).indexOf(id);
                        this.movies.splice(i, 1)
                    });
            }
        }
    }
</script>