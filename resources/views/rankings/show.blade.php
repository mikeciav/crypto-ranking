@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12 well">
				<h2>{{$ranking->title}}</h2>
				<hr>
				<div class="col-md-3">
					<span>Biggest Riser</span>
					<span><img src="/logos/32x32/omise-go.png"/>OmiseGo (+5)</span>
				</div>
				<div class="col-md-3">
					<span>Biggest Faller</span>
					<span><img src="/logos/32x32/neo.png"/>NEO (-3)</span>
				</div>
				<div class="col-md-3">
					<span>Biggest Pump</span>
					<span><img src="/logos/32x32/ethereum.png"/>TrueCoin (+11.32%)</span>
				</div>
				<div class="col-md-3">
					<span>Biggest Dump</span>
					<span><img src="/logos/32x32/bitcoin.png"/>Shitcoin (-5.5%)</span>
				</div>
			</div>

			<hr>

			<div class="col-md-12 well">
				<table>
					<th>
						<td>Rank <small>(change)</small></td>
						<td>Cryptocurrency</td>
						<td>Market Cap</td>
						<td>Price</td>
						<td>7-Day % Change</td>
					</th>
					<tr>
						<td>1 <span class='dir-none'> (--)</span></td>
						<td class='ranking-coin-name'>
							<img src="/logos/32x32/bitcoin.png"/>
							Bitcoin (BTC)
						</td>
						<td>$71.67 Billion</td>
						<td>$4200.99</td>
						<td class='dir-up'>+2.56%</td>
					</tr>
					<tr>
						<td>2 <span class='dir-none'> (--)</span></td>
						<td class='ranking-coin-name'>
							<img src="/logos/32x32/ethereum.png"/>
							Ethereum (ETH)
						</td>
						<td>$32.55 Billion</td>
						<td>$344.12</td>
						<td class='dir-down'>-0.56%</td>
					</tr>
				</table>
			</div>

			<div class='row'>
				<div class='col-md-5'>
					<span class='st_facebook_large'></span>
					<span class='st_twitter_large'></span>
					<span class='st_reddit_large'></span>
					<span class='st_googleplus_large'></span>
					<span class='st_wordpress_large'></span>
					<span class='st_blogger_large'></span>
				</div>
			</div>
			<div class='row'>
				@if(isset($prev_id))
					<div class="col-sm-4">
						<a href="{{route('rankings.show', $prev_id)}}" class='btn btn-default btn-block'>&lt; Previous Ranking</a>
					</div>
				@endif
				@if(isset($next_id))
					<div class="col-sm-4 pull-right">
						<a href="{{route('rankings.show', $next_id)}}" class='btn btn-default btn-block'>Next Ranking &gt;</a>
					</div>
				@endif
			</div>
			<hr>
			<!--	@include('partials.disqus') -->
		</div>	
	</div>

@stop