@extends('layouts.user_dashboard')

@section('sub-title')
    | Add Post
@stop

@section('style')
@stop

@section('content')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Criar Oferta</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form action="{{route('saveList')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <?php
                $title = (old('title')) ? old('title') : '';
                $short_desc = (old('short_desc')) ? old('short_desc') : '';
                $cat_id= (old('cat_id')) ? old('cat_id') : '';
                $address = (old('address')) ? old('address') : '';
                $city_id = (old('city_id')) ? old('city_id') : '';
                $zip_code = (old('zip_code')) ? old('zip_code') : '';
                $phone = (old('phone')) ? old('phone') : '';
                $email = (old('email')) ? old('email') : '';
                $website = (old('website')) ? old('website') : '';
                $facebook = (old('facebook')) ? old('facebook') : '';
                $linkdin = (old('linkdin')) ? old('linkdin') : '';
                $twitter = (old('twitter')) ? old('twitter') : '';
                $google = (old('google')) ? old('google') : '';
                $description = (old('description')) ? old('description') : '';
                $amenities = (old('amenities')) ? old('amenities') : array();
                $total_allowed_coupon = (old('total_allowed_coupon')) ? old('total_allowed_coupon') : 999;
                $users_coupon_per_day = (old('users_coupon_per_day')) ? old('users_coupon_per_day') : 1;
                $coupon_begin_hour = (old('coupon_begin_hour')) ? old('coupon_begin_hour') : '07:00';
                $coupon_end_hour = (old('coupon_end_hour')) ? old('coupon_end_hour') : '20:00';
                $coupon_start_date = (old('coupon_start_date')) ? old('coupon_start_date') : date('Y-m-d');
                $coupon_end_date = (old('coupon_end_date')) ? old('coupon_end_date') : date('Y-m-d', strtotime("+15 days"));
                $min_price = (old('min_price')) ? old('min_price') : '';
                $max_price = (old('max_price')) ? old('max_price') : '';
                $video = (old('video')) ? old('video') : '';
                $location = (old('location')) ? old('location') : '';
                //dd($errors->all());
                ?>
                
                <div class="add_listing_info">
                    <h3>Informações Básicas</h3>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <label class="label-title"> Nome do estabelecimento (O tamanho máximo do nome do estabelecimento é 30
                            caracteres)</label>
                        <input type="text" value="{{ $title }}" name="title" class="form-control">
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('short_desc') ? 'has-error' : ''}}">
                        <label class="label-title">Resumo da oferta (O resumo da oferta tem que ter mínimo 30
                            caracteres)</label>
                        <input type="text" value="{{ $short_desc }}" name="short_desc"
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
                        <input type="text" value="{{ $address }}" name="address" class="form-control">
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
                            <input type="text" value="{{ $zip_code }}" name="zip_code" class="form-control">
                            {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-sm-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
                            <label class="label-title">Número do telefone</label>
                            <input type="text" value="{{ $phone }}" name="phone" class="form-control">
                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label class="label-title">Email <span>(opcional)</span></label>
                            <input type="text" value="{{ $email }}" name="email" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="label-title">Website <span>(opcional)</span></label>
                            <input type="text" value="{{ $website }}" name="website" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3 col-sm-6">
                            <label class="label-title">Facebook <span>(opcional)</span></label>
                            <input type="text" value="{{ $facebook }}" name="facebook" class="form-control">
                        </div>
                    <!--
        	                    <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Linkdin <span>(opcional)</span></label>
                                    <input type="text" value="{{ $linkdin }}" name="linkdin" class="form-control">
                                </div> 
    	                        <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Twitter <span>(opcional)</span></label>
                                    <input type="text" value="{{ $twitter }}" name="twitter" class="form-control">
                                </div>
								-->
                        <div class="form-group col-md-3 col-sm-6">
                            <label class="label-title">Instagram <span>(opcional)</span></label>
                            <input type="text" value="{{ $google }}" name="google" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="add_listing_info">
                    <h3>Detalhe e regras do anúncio</h3>
                    <div class="row">
                        <div class="form-group col-sm-12 {{ $errors->has('description') ? 'has-error' : ''}}">
                            <label class="label-title">Descrição</label>
                            <textarea class="form-control" name="description">{{$description}}</textarea>
                            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 {{ $errors->has('amenities') ? 'has-error' : ''}}">
                            <label class="label-title">Dias da Semana <span>(Escolha pelo menos um dia)</span></label>
                            <div class="row">
                                <?php $i = 1; $j = 1; ?>
                                @foreach($Amenity as $k => $data)
                                    <div class="checkbox col-sm-2">
                                        <input type="checkbox" id="amenities{{++$k}}" name="amenities[{{$j++}}]" value="{{$data->id}}" @if(in_array($data->id, $amenities)){{'checked'}}@endif>
                                        <label for="amenities{{$i++}}">{{$data->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            {!! $errors->first('amenities', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 {{ $errors->has('total_allowed_coupon') ? 'has-error' : ''}}">
                            <label class="label-title">Total de cupons permitidos</label>
                            <input type="number" name="total_allowed_coupon" value="{{ $total_allowed_coupon }}" class="form-control"
                                   min="0" max="999">
                            {!! $errors->first('total_allowed_coupon', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-sm-6 {{ $errors->has('users_coupon_per_day') ? 'has-error' : ''}}">
                            <label class="label-title">Total de cupons por usuário <span>(Dia)</span></label>
                            <input type="number" name="users_coupon_per_day" value="{{ $users_coupon_per_day }}" class="form-control"
                                   min="0">
                            {!! $errors->first('users_coupon_per_day', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 {{ $errors->has('coupon_begin_hour') ? 'has-error' : ''}}">
                            <label class="label-title">Geração de cupons começa a hora</label>
                            <input type="time" name="coupon_begin_hour" value="{{ $coupon_begin_hour }}" class="form-control">
                            {!! $errors->first('coupon_begin_hour', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-sm-6 {{ $errors->has('coupon_end_hour') ? 'has-error' : ''}}">
                            <label class="label-title">Geração de cupons termina a hora</label>
                            <input type="time" name="coupon_end_hour" value="{{ $coupon_end_hour }}" class="form-control">
                            {!! $errors->first('coupon_end_hour', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 {{ $errors->has('coupon_start_date') ? 'has-error' : ''}}">
                            <label class="label-title">data de início da vigência da oferta</label>
                            <input type="date" name="coupon_start_date" value="@if(!empty( $coupon_start_date )){{date("Y-m-d", strtotime( $coupon_start_date ))}}@else{{''}} @endif" class="form-control" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                            {!! $errors->first('coupon_start_date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-sm-6 {{ $errors->has('coupon_end_date') ? 'has-error' : ''}}">
                            <label class="label-title">data de termino da vigência da oferta</label>
                            <input type="date" name="coupon_end_date" value="@if(!empty( $coupon_end_date )){{date("Y-m-d", strtotime( $coupon_end_date ))}}@else{{''}} @endif" class="form-control" @if(!empty( $coupon_start_date ))min="{{date("Y-m-d", strtotime( $coupon_start_date ))}}"@else disabled="disabled"@endif pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                            {!! $errors->first('coupon_end_date', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="add_listing_info">
                    <h3>Preço da oferta</h3>
                    <div class="row">
                        <div class="form-group col-sm-6 {{ $errors->has('min_price') ? 'has-error' : ''}}">
                            <label class="label-title">Preço orginal</label>
                            <input type="text" value="{{ $min_price }}" name="min_price" class="form-control"
                                   min="0">
                            {!! $errors->first('min_price', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-sm-6 {{ $errors->has('max_price') ? 'has-error' : ''}}">
                            <label class="label-title">Preço da oferta</label>
                            <input type="text" value="{{ $max_price }}" name="max_price" class="form-control"
                                   min="0">
                            {!! $errors->first('max_price', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                </div>

                <!-- Zaher disabled 14 Oct 2018
                    <div class="add_listing_info">
                        <h3>Add Video</h3>
                        <div class="form-group">
                            <label class="label-title">Video Youtube URL <code>Only embeded code supported</code></label>
                            <input type="text" value="{{ $video }}" name="video" class="form-control">
                        </div>
                    </div>

                    <div class="add_listing_info">
                        <h3>Adicionar local (opcional)</h3>
                        <div class="form-group">
                            <label class="label-title">Google Location <code>Apenas "embeded code" suportado</code></label>
                            <input type="text" value="{{ $location }}" name="location" class="form-control">
                        </div>
                    </div>
                    -->
                
                <div class="add_listing_info">
                    <h3>Adicionar imagens (Pelo menos uma imagem)</h3>
                    <div class="row">
                        <div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
                            <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple/>
                            {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            <div id="image_preview"></div>
                        </div>
                    </div>
                </div>

                <div class="add_listing_info">
                        <input type="submit" value="Salvar Oferta" class="btn btn-block">
                    </div>
            </form>
        </div>
    </div>

@stop

@section('script')
    <script src="{{asset('public/assets/admin/js/jquery.form.js')}}"></script>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script>
        bkLib.onDomLoaded(function () {
            nicEditors.allTextAreas()
        });

        function preview_images() {
            var total_file = document.getElementById("images").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
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
        });

        @if ($errors->any())
            showMessage("Validation failed", "error");
        @endif
    </script>
@stop

