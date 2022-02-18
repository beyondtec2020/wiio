@extends('layouts.user_dashboard')
@section('sub-title')
    | Edit Post
@stop
@section('style')
@stop
@section('content')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Alterar Oferta</h2>
                <a href="{{ URL::previous() }}" type="button" class="pull-right btn  btn-info btn-flat"><i
                            class="fa fa-arrow-left"></i> <b>Voltar </b> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form action="{{route('updateList')}}" method="post" enctype="multipart/form-data" name="updateList">
                {{csrf_field()}}

                <?php
                $ad_amenities = array();
                foreach($addlistAmenity as  $ss) {
                    $ad_amenities[] = $ss->amenities_id;
                }

                $title = (old('title')) ? old('title') : (($AddList->title) ? $AddList->title : '');
                $short_desc = (old('short_desc')) ? old('short_desc') : (($AddList->short_desc) ? $AddList->short_desc : '');
                $cat_id = (old('cat_id')) ? old('cat_id') : (($AddList->cat_id) ? $AddList->cat_id : '');
                $address = (old('address')) ? old('address') : (($AddList->address) ? $AddList->address : '');
                $city_id = (old('city_id')) ? old('city_id') : (($AddList->city_id) ? $AddList->city_id : '');
                $zip_code = (old('zip_code')) ? old('zip_code') : (($AddList->zip_code) ? $AddList->zip_code : '');
                $phone = (old('phone')) ? old('phone') : (($AddList->phone) ? $AddList->phone : '');
                $email = (old('email')) ? old('email') : (($AddList->email) ? $AddList->email : '');
                $website = (old('website')) ? old('website') : (($AddList->website) ? $AddList->website : '');
                $facebook = (old('facebook')) ? old('facebook') : (($AddList->facebook) ? $AddList->facebook : '');
                $linkdin = (old('linkdin')) ? old('linkdin') : (($AddList->linkdin) ? $AddList->linkdin : '');
                $twitter = (old('twitter')) ? old('twitter') : (($AddList->twitter) ? $AddList->twitter : '');
                $google = (old('google')) ? old('google') : (($AddList->google) ? $AddList->google : '');
                $description = (old('description')) ? old('description') : (($AddList->description) ? $AddList->description : '');
                $amenities = (old('amenities')) ? old('amenities') : (!empty($ad_amenities) ? $ad_amenities : array());
                $total_allowed_coupon = (old('total_allowed_coupon')) ? old('total_allowed_coupon') : (($AddList->total_allowed_coupon) ? $AddList->total_allowed_coupon : 999);
                $users_coupon_per_day = (old('users_coupon_per_day')) ? old('users_coupon_per_day') : (($AddList->users_coupon_per_day) ? $AddList->users_coupon_per_day : 1);
                $coupon_begin_hour = (old('coupon_begin_hour')) ? old('coupon_begin_hour') : (($AddList->coupon_begin_hour) ? $AddList->coupon_begin_hour : '07:00');
                $coupon_end_hour = (old('coupon_end_hour')) ? old('coupon_end_hour') : (($AddList->coupon_end_hour) ? $AddList->coupon_end_hour : '20:00');
                $coupon_start_date = (old('coupon_start_date')) ? old('coupon_start_date') : (($AddList->coupon_start_date) ? $AddList->coupon_start_date : date('Y-m-d'));
                $coupon_end_date = (old('coupon_end_date')) ? old('coupon_end_date') : (($AddList->coupon_end_date) ? $AddList->coupon_end_date : date('Y-m-d', strtotime("+15 days")));
                $min_price = (old('min_price')) ? old('min_price') : (($AddList->min_price) ? $AddList->min_price : '');
                $max_price = (old('max_price')) ? old('max_price') : (($AddList->max_price) ? $AddList->max_price : '');
                $video = (old('video')) ? old('video') : (($AddList->video) ? $AddList->video : '');
                $location = (old('location')) ? old('location') : (($AddList->location) ? $AddList->location : '');
                ?>
                <div class="add_listing_info">
                    <h3>Informações Básicas</h3>
                    <input type="hidden" name="id" value="{{$AddList->id}}">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <label class="label-title"> Nome do estabelecimento (O tamanho máximo do nome do estabelecimento é 30
                            caracteres)</label>
                        <input type="text" name="title" class="form-control" value="{{$title}}">
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('short_desc') ? 'has-error' : ''}}">
                        <label class="label-title">Resumo da oferta (O resumo da oferta tem que ter mínimo 30
                            caracteres)</label>
                        <input type="text" value="{{$short_desc}}" name="short_desc"
                               class="form-control">
                        {!! $errors->first('short_desc', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('cat_id') ? 'has-error' : ''}}">
                        <label class="label-title">Categoria</label>
                        <div class="select">
                            <select class="form-control" name="cat_id">
                                <option value="">Selecionar categoria</option>
                                @foreach($categories as $data)
                                    <option value="{{$data->id}}" @if($data->id == $cat_id){{'selected'}}@endif>{{$data->name}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('cat_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="add_listing_info">
                    <h3>Informações de contato</h3>
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                        <label class="label-title">Endereço</label>
                        <input type="text" value="{{$address}}" name="address" class="form-control">
                        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 {{ $errors->has('city_id') ? 'has-error' : ''}}">
                            <label class="label-title">Cidade</label>
                            <div class="select">
                                <select class="form-control" name="city_id">
                                    <option value="">Selecionar Cidade</option>
                                    @foreach($cities as $data)
                                        <option value="{{$data->id}}" @if($data->id == $city_id){{'selected'}}@endif>{{$data->name}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 {{ $errors->has('zip_code') ? 'has-error' : ''}}">
                            <label class="label-title">CEP</label>
                            <input type="text" name="zip_code" value="{{$zip_code}}" class="form-control">
                            {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-sm-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
                            <label class="label-title">Telefone</label>
                            <input type="text" name="phone" value="{{$phone}}" class="form-control">
                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label class="label-title">Email <span>(opcional)</span></label>
                            <input type="text" name="email" value="{{$email}}" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="label-title">Website <span>(opcional)</span></label>
                            <input type="text" name="website" value="{{$website}}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3 col-sm-6">
                            <label class="label-title">Facebook <span>(opcional)</span></label>
                            <input type="text" value="{{$facebook}}" name="facebook" class="form-control">
                        </div>
                    <!--
        	                    <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Linkdin <span>(opcional)</span></label>
                                    <input type="text" name="linkdin" value="{{$linkdin}}" class="form-control">
                                </div> 
    	                        <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Twitter <span>(opcional)</span></label>
                                    <input type="text" name="twitter" value="{{$twitter}}" class="form-control">
                                </div> 
								-->
                        <div class="form-group col-md-3 col-sm-6">
                            <label class="label-title">Instagram <span>(opcional)</span></label>
                            <input type="text" name="google" value="{{$google}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="add_listing_info">
                    <h3>Detalhe da oferta</h3>
                    <div class="row">
                        <div class="form-group col-sm-12 {{ $errors->has('description') ? 'has-error' : ''}}">
                            <label class="label-title">Descrição</label>
                            <textarea class="form-control" name="description">{{$description}}</textarea>
                            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="label-title">Dias da Semana <span>(Escolha pelo menos um dia)</span></label>
                            <div class="row">
                                <?php
                                    $i = 1; $j = 1;
                                ?>

                                @foreach($Amenity as $k => $data)
                                    <div class="checkbox col-sm-2">
                                        <input type="checkbox" id="amenities{{++$k}}" name="amenities[{{$j++}}]" value="{{$data->id}}" @if(in_array($data->id, $amenities)) {{'checked'}} @endif >
                                        <label for="amenities{{$i++}}">{{$data->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 {{ $errors->has('total_allowed_coupon') ? 'has-error' : ''}}">
                            <label class="label-title">Total de cupons permitidos</label>
                            <input type="number" name="total_allowed_coupon" value="{{$total_allowed_coupon}}" class="form-control"
                                   min="0" max="999">
                            {!! $errors->first('total_allowed_coupon', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-sm-6 {{ $errors->has('users_coupon_per_day') ? 'has-error' : ''}}">
                            <label class="label-title">Total de cupons por usuário <span>(Dia)</span></label>
                            <input type="number" name="users_coupon_per_day" value="{{$users_coupon_per_day}}" class="form-control"
                                   min="0">
                            {!! $errors->first('users_coupon_per_day', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 {{ $errors->has('coupon_begin_hour') ? 'has-error' : ''}}">
                            <label class="label-title">Geração de cupons começa a hora</label>
                            <input type="time" name="coupon_begin_hour" value="{{$coupon_begin_hour}}" class="form-control">
                            {!! $errors->first('coupon_begin_hour', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-sm-6 {{ $errors->has('coupon_end_hour') ? 'has-error' : ''}}">
                            <label class="label-title">Geração de cupons termina a hora</label>
                            <input type="time" name="coupon_end_hour" value="{{$coupon_end_hour}}" class="form-control">
                            {!! $errors->first('coupon_end_hour', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 {{ $errors->has('coupon_start_date') ? 'has-error' : ''}}">
                            <label class="label-title">data de início da vigência da oferta</label>
                            <input type="date" name="coupon_start_date" value="@if(!empty($coupon_start_date)){{date("Y-m-d", strtotime($coupon_start_date))}}@else{{''}} @endif" class="form-control">
                            {!! $errors->first('coupon_start_date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-sm-6 {{ $errors->has('coupon_end_date') ? 'has-error' : ''}}">
                            <label class="label-title">data de termino da vigência da oferta</label>
                            <input type="date" name="coupon_end_date" value="@if(!empty($coupon_end_date)){{date("Y-m-d", strtotime($coupon_end_date))}}@else{{''}} @endif" class="form-control" @if(!empty($coupon_start_date))min="{{date("Y-m-d", strtotime($coupon_start_date))}}"@else disabled="disabled"@endif>
                            {!! $errors->first('coupon_end_date', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="add_listing_info">
                    <h3>Preço da oferta</h3>
                    <div class="row">
                        <div class="form-group col-sm-6 {{ $errors->has('min_price') ? 'has-error' : ''}}">
                            <label class="label-title">Preço orginal</label>
                            <input type="text" name="min_price" value="{{$min_price}}" class="form-control"
                                   min="0">
                            {!! $errors->first('min_price', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-sm-6 {{ $errors->has('max_price') ? 'has-error' : ''}}">
                            <label class="label-title">Preço da oferta</label>
                            <input type="text" name="max_price" value="{{$max_price}}" class="form-control"
                                   min="0">
                            {!! $errors->first('max_price', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <!--
                        <div class="add_listing_info">
                            <h3>Add Video</h3>				
                            <div class="form-group">
                                <label class="label-title">Video Youtube (Embeded Code only)</label>
                                <input type="text" name="video" value="{{$video}}" class="form-control">
                            </div>      
                        </div>
                       
                        <div class="add_listing_info">
                            <h3>Adicionar local (opcional)</h3>               
                            <div class="form-group">
                                <label class="label-title">Google Location <code>Apenas "embeded code" suportado</code></label>
                                <input type="text" name="location" value="{{$location}}" class="form-control">
                            </div>      
                        </div>
                         -->
                
                <div class="add_listing_info">
                    <h3>Adicionar imagens (Pelo menos uma imagem)</h3>
                    <div class="row">
                        <div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
                            <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple/>
                        </div>
                        {!! $errors->first('images', '<p class="help-block" style="color: red">:message</p>') !!}
                        <div class="form-group">
                            <div id="image_preview"></div>
                        </div>

                        <div id="see">
                            <?php $view = $AddList->CountImage()->get(); ?>
                            @foreach($view as $k => $v)
                                <div class="col-md-3">
                                    @if($k != 0)
                                        <a href="{{url('/del-list-single-image/'.$v->id)}}" class="close"
                                           aria-label="Close" onclick="return checkDelete();">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    @endif
                                    <br>
                                    <img class="img-responsive" src="{{asset('public/images/'.$v->image)}}"
                                         style="margin-bottom: 20px"/>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Alterar oferta" class="btn btn-block">
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    {{--<script type="text/javascript">
        document.forms['updateList'].elements['catgory'].value = {{$AddList->cat_id}}
            document.forms['updateList'].elements['city'].value ={{$AddList->city_id}}
    </script>--}}

@stop

@section('script')
    <script src="{{asset('public/assets/admin/js/jquery.form.js')}}"></script>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function () {
            nicEditors.allTextAreas()
        });

        function preview_images() {
            var total_file = document.getElementById("images").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
            }
        }

        $("#images").click(function () {
            $("#see").hide();
        });

        function checkDelete() {
            chk = confirm('Are You want to sure delete ??');
            if (chk) {
                return true;
            } else {
                return false;
            }
        }

        $(document).ready(function () {
            $("body").on("change", "input[name='coupon_start_date']", function (e) {
                var $this = $(this);
                if ($this.val()) {
                    $("input[name='coupon_end_date']").removeAttr("disabled").attr("min", $this.val());
                } else {
                    $("input[name='coupon_end_date']").attr("disabled", "disabled").val('');
                }
            });
        })

        @if ($errors->any())
            showMessage("Validation failed", "error");
        @endif
    </script>
@stop


