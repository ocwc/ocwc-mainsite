<script class="js-community-template" type="text/x-handlebars-template">
	<div class="community-entry">
		<table class="table table-striped table-bordered">
		{{#each (limit topic_list.topics 5)}}
			<tr>
				<td class="text-center">{{ last_poster_username }}</td>
				<td><a href="http://community.oeconsortium.org/t/{{slug}}/">{{title}}</a></td>
				<td class="text-center">
					<a class="btn btn-primary btn-sm" 
						href="http://community.oeconsortium.org/t/{{slug}}/">View
					</a>
				</td>
			</tr>
		{{/each}}
		</table>
		<div class="row">
			<div class="col-sm-12">
				<a class="btn btn-primary" 
					href="http://community.oeconsortium.org/">Join Open Education Community</a>
			</div>
		</div>
	</div>
</script>

<div class="row voffset-30">
	<h2>Latest Forum Posts by Community members</h2>
	<div class="js-community"></div>
</div>