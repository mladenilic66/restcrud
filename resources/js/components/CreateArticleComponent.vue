<template>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-12">
	        	<h2>Create new article</h2>

	        	<form enctype="multipart/form-data">
	        		<!-- <div class="form-group" v-if="image">
                      	<img :src="image" class="img-responsive" height="70" width="90">
                   	</div> -->
                  	<!-- <div class="form-group">
                      	<input type="file" v-on:change="onImageChange" class="form-control">
                  	</div> -->
					<div class="form-group">
					    <label>Name</label>
					    <input v-model="article.title" type="text" class="form-control" placeholder="Doe Doeson">
					</div>
					<!-- <div class="form-group">
					   	<label>File
				        	<input type="file" ref="file" @change="handleFileUpload()"/>
				      	</label>
					</div> -->
					<!-- <input type="file" accept="image/*" @change="uploadImage($event)" id="file-input"> -->
					<div class="form-group">
					    <label>Description</label>
					    <textarea v-model="article.body" class="form-control" rows="5"></textarea>
					</div>
					<!-- <button @click="submitFile" type="submit" class="btn btn-success">Send</button> -->
					<!-- <input type="submit" value="submit"/> -->
					<button class="btn btn-success btn-block" @click="uploadImage">Save</button>
				</form>
	        </div>
	    </div>
	</div>
</template>

<script type="text/javascript">

		// import JQuery from 'jquery';
		// let $ = JQuery;

		// $("#form").submit(function(){
		//     var formData = new FormData($(this)[0]);
		//    	$.ajax({
		//        url: 'http://restcrud.com/img',
		//        type: 'POST',
		//        data: formData,
		//        async: true,
		//        // cache: true,
		//        contentType: true,
		//        // enctype: 'multipart/form-data',
		//        processData: true,
		//        	success: function (response) {
		//          	alert(response);
		//        	},
		//        	error: function(response) {
		//        		alert(response);
		//        	}
		//    	});
		// });

	export default {
		data: function() {
			return {
				articles: {},
				article: {
					id: '21',
					user_id: '1',
					title: '',
					body: ''
				},
				article_id: '',
				editmode: false,
				image: ''
			}
		},
		methods: {
			// onImageChange(e) {
   //              let files = e.target.files || e.dataTransfer.files;
   //              if (!files.length) {
   //                  return;
   //              }
   //              this.createImage(files[0]);
   //          },
   //          createImage(file) {
   //              let reader = new FileReader();
   //              let vm = this;
   //              reader.onload = (e) => {
   //                  vm.image = e.target.result;
   //              };
   //              reader.readAsDataURL(file);
   //          },
            uploadImage() {
            	if (this.editmode === false) {

					fetch('api/articles', {
						method: 'post',
						body: JSON.stringify(this.article),
						headers: {
							'content-type': 'application/json'
						}
					})
					.then(res => res.json())
					.then(data => {
						this.article.title = '';
						this.article.body = '';
					})
					.catch(err => console.log(err));

            		// axios.post('/images/store', { image: this.image }).then(response => {
	             //        if (response.data.success) {
	             //            alert(response.data.success);
	             //        }
	             //    });
            	} else {

            	}
            }
			// uploadImage(event) {
			//     const URL = 'http://restcrud.com/img'; 

			//     let data = new FormData();
			//     data.append('name', 'my-picture');
			//     data.append('file', event.target.files[0]); 

			//     let config = {
			//       	header : {
			//         	'Content-Type' : 'multipart/form-data'
			//       	}
			//     }

			//     axios.post(URL, data, config).then(response => {
			//         	console.log(response)
			//       	}
			//     )
			// }

   //    		submitFile(){
   //    			let formData = new FormData();
   //    			formData.set('userName', 'Fred');
   //    			formData.append('file', this.file);
			// 	axios({
			// 	    method: 'post',
			// 	    url: 'http://restcrud.com/ima',
			// 	    data: formData,
			// 	    config: { header: {'Content-Type': 'multipart/form-data' }}
			// 	    })
			// 	    .then(function (response) {
			// 	        console.log(response.data);
			// 	    })
			// 	    .catch(function (response) {
			// 	        console.log(response);
			// 	    });
			// },
			// handleFileUpload() {
			// 	this.file = this.$refs.file.files[0];
   //    		}
			// onFileChanged() {
			//     this.file = this.$refs.file.files[0];
			// },
			// upload() {
			// 	const formData = new FormData();
			// 	formData.append('file', this.file);
			// 	axios.post('img/', formData);
			// }
			// addArticle() {
			// 	if (this.editmode === false) {
			// 		axios.post('/api/articles', this.article)
   //          			.then(response => console.log(response))
   //          			.catch(error => console.log(error));
			// 	} else {

			// 	}
			// }
		}
	}
</script>