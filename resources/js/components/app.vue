<template>
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="/">Movies Database</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Movies List</router-link>
                    <router-link to="/create" class="nav-item nav-link">Create Movie</router-link>
                </div>
            </div>
    </nav>
    <div class="container">
       
        <router-view> </router-view>
    </div>
    </div>
</template>
 
<script>
    export default {}
</script>