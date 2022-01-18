

    <div class="form-group{{ $errors->has('bu_name') ? ' has-error' : '' }}">
      <label class="col-md-2" style="left: 1000px">
اسم العقار
      </label>

        <div class="col-md-12">
          {!! Form::text("bu_name",null,['class'=>'form-control']) !!}

            @if ($errors->has('bu_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="clearfix"></div>
    <br>

    <div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
      <label class="col-md-2" style="left: 1000px">
عدد الغرف
      </label>

        <div class="col-md-12">
          {!! Form::select("rooms",roomnumber(),null,['class'=>'form-control select2']) !!}

            @if ($errors->has('rooms'))
                <span class="help-block">
                    <strong>{{ $errors->first('rooms') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="clearfix"></div>
    <br>

    <div class="form-group{{ $errors->has('bu_price') ? ' has-error' : '' }}">
      <label class="col-md-2" style="left: 1000px">
سعر العقار
      </label>

        <div class="col-md-12">
          {!! Form::text("bu_price",null,['class'=>'form-control']) !!}

            @if ($errors->has('bu_price'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_price') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="clearfix"></div>
    <br>

        <div class="form-group{{ $errors->has('bu_rent') ? ' has-error' : '' }}">
          <label class="col-md-2" style="left: 1000px">
    نوع العملية
          </label>

            <div class="col-md-12">
              {!! Form::select("bu_rent",bu_rent(),null,['class'=>'form-control']) !!}

                @if ($errors->has('bu_rent'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_rent') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="clearfix"></div>
        <br>

            <div class="form-group{{ $errors->has('bu_square') ? ' has-error' : '' }}">
              <label class="col-md-2" style="left: 1000px">
        المساحة
              </label>

                <div class="col-md-12">
                  {!! Form::text("bu_square",null,['class'=>'form-control']) !!}

                    @if ($errors->has('bu_square'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bu_square') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="clearfix"></div>
            <br>

                <div class="form-group{{ $errors->has('bu_type') ? ' has-error' : '' }}">
                  <label class="col-md-2" style="left: 1000px">
نوع العقار
                  </label>

                    <div class="col-md-12">
                        {!! Form::select("bu_type",bu_type(),null,['class'=>'form-control']) !!}

                        @if ($errors->has('bu_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bu_type') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="clearfix"></div>
                <br>
@if(!isset($user))
                <div class="form-group{{ $errors->has('bu_status') ? ' has-error' : '' }}">
                  <label class="col-md-2" style="left: 1000px">
            حالة العقار
                  </label>

                    <div class="col-md-12">
                      {!! Form::select("bu_status",status(),null,['class'=>'form-control']) !!}

                        @if ($errors->has('bu_status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bu_status') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
@endif
                <div class="clearfix"></div>
                <br>

                <div class="form-group{{ $errors->has('bu_place') ? ' has-error' : '' }}">
                  <label class="col-md-2" style="left: 1015px">
          المنطقه
                  </label>

                    <div class="col-md-12">
                      {!! Form::select("bu_place",bu_place(),null,['class'=>'form-control select2']) !!}

                        @if ($errors->has('bu_place'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bu_place') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  <label class="col-md-2" style="left: 990px">
          صورة للعقار
                  </label>

                    <div class="col-md-1">
                      @if(isset($bu))
                      @if($bu->image !='')
                   <img src="{{Request::root().'/website/bu_images/'.$bu->image}}" width="100" >
                     <div class="clearfix"></div>
                     <br>
                      @endif
                      @endif
                      {!! Form::file("image",null,['class'=>'form-control']) !!}

                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="clearfix"></div>
                <br>

                    <div class="form-group{{ $errors->has('bu_meta') ? ' has-error' : '' }}">
                      <label class="col-md-2" style="left: 970px">
                الكلمات الدلالية
                      </label>

                        <div class="col-md-12">
                          {!! Form::text("bu_meta",null,['class'=>'form-control']) !!}

                            @if ($errors->has('bu_meta'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bu_meta') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <br>
@if(!isset($user))
                        <div class="form-group{{ $errors->has('bu_small_dis') ? ' has-error' : '' }}">
                          <label class="col-md-2" style="left: 920px">
                    وصف العقار لمحركات البحث
                          </label>

                            <div class="col-md-12">
                              {!! Form::textarea("bu_small_dis",null,['class'=>'form-control','rows'=>'4']) !!}

                                @if ($errors->has('bu_small_dis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_small_dis') }}</strong>
                                    </span>
                                @endif
                                <br>
                                <div class="alert alert-warning">
                                  <center>
                                   لايمكن ادخال اكثر من 160 حرف حسب معايير جوجل
                                  </center>

                                </div>
                            </div>
                        </div>
  @endif

                        <div class="form-group{{ $errors->has('bu_langtuide') ? ' has-error' : '' }}">
                          <label class="col-md-2" style="left: 1000px">
                    خط الطول
                          </label>

                            <div class="col-md-12">
                              {!! Form::text("bu_langtuide",null,['class'=>'form-control']) !!}

                                @if ($errors->has('bu_langtuide'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_langtuide') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>

                        <div class="form-group{{ $errors->has('bu_latituide') ? ' has-error' : '' }}">
                          <label class="col-md-2" style="left: 980px">
                    دائره العرض
                          </label>

                            <div class="col-md-12">
                              {!! Form::text("bu_latituide",null,['class'=>'form-control']) !!}

                                @if ($errors->has('bu_latituide'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_latituide') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <br>

                        <div class="form-group{{ $errors->has('bu_large_dis') ? ' has-error' : '' }}">
                          <label class="col-md-2" style="left: 920px">
                    الوصف المطول للعقار
                          </label>

                            <div class="col-md-12">
                              {!! Form::textarea("bu_large_dis",null,['class'=>'form-control']) !!}

                                @if ($errors->has('bu_large_dis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bu_large_dis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>



    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-warning">
                <i class="fa fa-btn fa-user"></i> تنفيذ
            </button>
        </div>
    </div>
    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
