<template>
	<div v-if="show" class="modal" tabindex="-1" role="dialog">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        			<span aria-hidden="true">&times;</span>
	        		</button>
	       			<h4 class="modal-title">Modal title</h4>
	      		</div>
	      		<div class="modal-body">
	        		<p>One fine body</p>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        		<button type="button" class="btn btn-primary">Save changes</button>
	      		</div>
	    	</div>
	  	</div>
	</div>
</template>

<script>
	export default {
		props: {
			editCategory: {
				default: null
			}
		},
		data() {
			return {
				show: false
			}
		},
		ready() {
			this.$set('category', this.resetCategoryData());
		},
		methods: {
			toggleForm: function() {
				return this.show = !this.show;
			},
			toggleAddForm: function() {
				this.resetCategoryData();
				this.toggleForm();
			},
			toggleEditForm: function(category) {
				if(!this.show) {
					this.category = category;
					return this.toggleForm();
				} 
				this.resetCategoryData();
				return this.toggleForm();
			},
			resetCategoryData: function() {
				this.category = {
					id: null,
					slug: null,
					title: '',
					description: '',
					display_order: ''
				};
			}
		}
	}
</script>