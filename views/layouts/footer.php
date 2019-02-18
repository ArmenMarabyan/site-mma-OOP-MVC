		<footer>
			<script type="text/javascript">

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$(document).ready(function(){
					$(".likes").click(function(e){
						e.preventDefault();


						var id = this.getAttribute('data-id')
						var like = this.getAttribute('data-like')
						var dislike = this.getAttribute('data-dislike')
						var data = {"id":id, "like" : like, 'dislike' : dislike};


						$.post("/like", {data}, function(data){
							console.log(data)
							$(".like").html('Нравится: ' + data.likes)
							$(".dislike").html(data.dislikes)

						})


					})
				})



			</script>
		</footer>
		</div>
	</div>

</body>
</html>