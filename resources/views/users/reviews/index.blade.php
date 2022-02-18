@extends('layouts.user_dashboard')
@section('sub-title')
| Post reviews
@stop

@section('style')
@stop
@section('content')
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Avaliações</h2>
				</div>
			</div>
		</div>

		<div class="row">			
                <!-- Review-List -->
                <div class="col-lg-12 col-md-12">
                    <div class="dashboard-list-box">
                        <ul>
                        <?php $userId = Sentinel::getUser()->id; ?>
                        @foreach($review as $data)

                        @if($data->addlist->user_id == $userId)
                            <li class="listing-reviews">
                                <div class="review_img">
                                    <?php $user = App\User::where('email', $data->email)->first();?>
                                    @if(!$user)
                                    <img src="{{asset('public/assets/admin/images/pro.png')}}" alt="image">
                                    @elseif($user->profile == null)
                                    <img src="{{asset('public/assets/admin/images/pro.png')}}" alt="image">
                                    @else
                                    <img src="{{asset('public/images/'.$user->profile)}}" alt="image">
                                    @endif

                                </div>
                                <div class="review_comments">
                                    <div class="comment-by">
                                    @if(!$user)
                                    	{{$data->email}}
                                    @else
                                    	{{$user->first_name}}
                                    @endif
                                    
                                    <span> no </span>
                                    <a href="{{url('/preview-lists/'.$data->addlist->id.'/'.$data->addlist->slug)}}">{{$data->addlist->title}}</a>
                                        <div class="listing_review_info"> <p>
                                         @switch($data->rating)
                                                @case(1)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star "></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                @break

                                                @case(2)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star "></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                @break
                                                
                                                @case(3)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                @break

                                                @case(4)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star"></i>
                                                @break

                                                @case(5)
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                @break

                                                @default
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            @endswitch
                                            </p>
                                        </div>
                                     </div>
                                    <span class="date">{{$data->created_at->toFormattedDateString()}}</span> 
                                    <div class="star-rating">
                                    </div>
                                    <p>{{$data->description}}</p>
                                </div>
                            </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    {!! $review->links()!!}
                </div>
    
            </div>
		
@stop