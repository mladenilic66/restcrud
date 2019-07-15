<template>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-12">
	            <div class="card-columns text-center">
					<div v-for="article in displayedPosts" :bind:key="article.id" class="card">
				    	<img class="card-img-top" :src="article.image" alt="Card image cap">
				    	<div class="card-body">
				      		<h5 class="card-title"><a :href="article.link">{{ article.title | uppercase }}</a></h5>
				      		<p class="card-text">{{ article.body }}</p>
				      		<p class="card-text"><small class="text-muted">{{ article.created_at }}</small></p>
				      		<button @click="deleteArticle(article.id)" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>
				    	</div>
				  	</div>
				</div>
				<div class="py-5">
					<pagination class="justify-content-center" :data="articles" @pagination-change-page="getResults"></pagination>
				</div>
	        </div>
	    </div>
	</div>
</template>

<script type="text/javascript">

	import axios from 'axios'

	export default {
		data: function() {
			return {
				articles: {},
				article_id: ''
			}
		},
		filters: {
	        uppercase(value) {
	            return value.toUpperCase();
	        }
	    },
		mounted() {
			this.getResults();
		},
		computed: {
			displayedPosts () {
		      return this.articles.data;
		    }
		},
		methods: {
			getResults(page = 1) {
				axios.get('api/articles?page=' + page).then(({ data }) => (this.articles = data));
			},
			deleteArticle(id) {
				if (confirm('Sure?')) {
					axios.delete(`api/articles/${id}`).then(({ data }) => (this.getResults())).catch(error => console.log(error));
				}
			}
		}
	}
</script>