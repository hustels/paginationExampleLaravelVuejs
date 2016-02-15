@extends('layout')
@section('content')
<div id="cards">
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>All Cards Test</h1>
			<div v-for="card in cards">
				<p>@{{card.title}}</p>
			</div>
			<form action="/cards/add" method="POST">
					<textarea name="title" id=""  class="form-control"></textarea>
					<hr>
					<button type="submit" class="btn btn-success">Add</button>
			</form>
			<nav>
			  <ul class="pagination" v-for="link in count_links" >
			    
			   <li><a href="#" @click="paginate(link)">@{{(link !=0 ? link: '#')}}</a></li>
			  </ul>
			</nav>
		</div>

		</div>
		
</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.8/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.1.17/vue-resource.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
	<script src="/js/cards/cards.js"></script>
@endsection