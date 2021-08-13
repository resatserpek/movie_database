import AllMovies from './components/AllMovies.vue';
import CreateMovie from './components/CreateMovie.vue';
import EditMovie from './components/EditMovie.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllMovies
    },
    {
        name: 'create',
        path: '/create',
        component: CreateMovie
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditMovie
    }
];