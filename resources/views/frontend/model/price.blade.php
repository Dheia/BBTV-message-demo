@extends('frontend.model.main')
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js"></script>
  
    
    <!-- wNumb.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js"></script>
<!--     <script src="js/wnumb.min.js"></script> -->
    


    <style>
        small.text-muted {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: rgba(255, 255, 255, 0.7);
}
.cabecera {
    background-color: #004AA1 !important;
    padding: 2rem;
    box-shadow: 0px 3px 5px 0px rgba(135,135,135,0.5);

}
.header h1 {
    color: white;
}

/* Estilos del slider deslizante */
.slider-round {
    height: 7px;
}
.noUi-target {
    background: unset;
    border-radius: unset;
    border: unset;
    box-shadow: unset;
}

.slider-round .noUi-target {
    border-radius: 12px !important;
    border: 0 !important;
}

.slider-round .noUi-connect {
    background: #a9029b !important;
    border-style: none;
    border-radius: .75rem;
}
.slider-round .noUi-connects {
    background: #EFF2F6;
    border-radius: .75rem;
    overflow: hidden;
    z-index: 0;
}
.slider-round .noUi-touch-area {
    background: #a9029b !important;
        border-radius: 12px;
    }
.slider-round .noUi-touch-area:hover {
    background: #006192;
}
            
.slider-round .noUi-handle {
    height: 1.5rem;
    width: 1.5rem;
    content: "";
    top: -0.416rem;
    /* right: -12px; */
    /* border: solid; */
    border-color: #a9029b;
    /* border-width: 0.25rem; */
    border-radius: 0.75rem;
    box-shadow: 0px 2px 3px 0px rgb(135 135 135 / 50%);
}
.noUi-tooltip {
    display: block;
    position: absolute;
    border: 1px solid #D9D9D9;
    border-radius: 3px;
    background: #a9029b;
    color: #000;
    padding: 5px;
    text-align: center;
    white-space: nowrap;
}
.noUi-tooltip {
    padding: 5px 21px;
    color: #fff;
}

.noUi-horizontal .noUi-handle {
    width: 18px;
    height: 18px;
    right: -14px;
    top: -6px;
}
.slider-round .noUi-handle:active {
    transform: scale(.9);
}
.slider-round .noUi-tooltip {
    /* top: -2rem; */
    /* bottom: initial; */
    margin-top: .25rem;
    margin-bottom: .25rem;
    /* border: none; */
    /* background-color: transparent; */
    border-radius: .5rem;
 border-color: #741d62;
    /* box-shadow: 0px 3px 5px 0px rgba(135,135,135,0.5); */
    /* opacity: 1;
    transition: opacity 1s; */

}
/* [type="radio"]:not(:checked) {
    position: unset;
    left: 8px;
    width: 24%;
    margin: 9px;
    z-index: 11;
    background: none;
} */
.noUi-horizontal .noUi-tooltip {
    -webkit-transform: translate(-50%, 0);
    transform: translate(-50%, 0);
    left: 50%;
    bottom: 123%;}
.slider-round .noUi-tooltip:hover {
    border-color: rgba(0, 143, 213, 1) ;
    
}
.slider-round .noUi-tooltip::after {
    content: " ";
    position: absolute;
    top: 100%; /* parte inferior del tooltip */
    left: 50%;
    margin-left: -.375rem;
    border-width: .375rem;
    border-style: solid;
    border-color: rgb(182 0 213 / 80%) transparent transparent transparent;
}

.slider-round .noUi-handle-lower::before {
    display: none!important;
}
.slider-round .noUi-handle-lower::after {
    display: none!important;
}

    </style>
    


              
               
                 <div class="col-sm-12 text-white col-md-8 col-lg-9 mt-5 mb-5">
                        <div class="row">
                          <div class="col-lg-12 col-md-12">
                            <div class="d-flex justify-content-between">
                              <div><h5><b>Set your Fees</b></h5></div>
                            </div>
                            <div class="card ">
                              <div class="card-body text-white">
                               <div class="card">
                                <form action="{{route('model.priceset')}}"  method="POST" >
                                    @csrf
                                <small class="card-header">How much do you want to charge for</small>
                                <ul class="list-unstyled card-body mb-0 pb-0">
                                  <li class="">
                                    <small class="text-muted">Texts sent to you?</small>
                                
                                        <div class="form-group mt-4">
                                            <div class="slider-round" id="slider-round-2"></div>
                                            <input type="hidden" name="textprice" id="hidden-input-range1" >
                                            <div class="card-text d-flex justify-content-between mt-3">
                                                <p class="text-muted">Min $1.00</p>
                                                <p class="text-muted">Max $5.00</p>
                                            </div>
                                        </div>
                                  
                                  </li>
                                  <li class="">
                                    <small class="text-muted">Pictures you send or receive?</small>
                                
                                        <div class="form-group mt-4">
                                            <div class="slider-round" id="slider-round-3"></div>
                                            <input type="hidden" id="hidden-input-range2" name="pictureprice">
                                            <div class="card-text d-flex justify-content-between mt-3">
                                                <p class="text-muted">Min $1.00</p>
                                                <p class="text-muted">Max $10.00</p>
                                            </div>
                                        </div>
                                  
                                  </li>
                                  <li class="">
                                    <small class="text-muted">Audio you send or receive?</small>
                                
                                        <div class="form-group mt-4">
                                            <div class="slider-round" id="slider-round-4"></div>
                                            <input type="hidden" id="hidden-input-range3" name="audioprice">
                                            <div class="card-text d-flex justify-content-between mt-3">
                                                <p class="text-muted">Min $1.00</p>
                                                <p class="text-muted">Max $20.00</p>
                                            </div>
                                        </div>
                                  
                                  
                                  </li>
                                  <li class="">
                                    <small class="text-muted">Videos you send or receive?</small>
                                
                                    <div class="form-group mt-4">
                                        <div class="slider-round" id="slider-round-5"></div> <input type="hidden" id="hidden-input-range4" name="videoprice">
                                        <div class="card-text d-flex justify-content-between mt-3">
                                            <p class="text-muted">Min $1.00</p>
                                            <p class="text-muted">Max $20.00</p>
                                        </div>
                                    </div>
                              
                                  
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-lg-12 col-md-12">
                            <div class="card ">
                              <div class="card-body text-white">

                               <div class="card">
                                <div class=" d-flex justify-content-between">
                                 
                                    <small class="card-header p-0">Do you want to accept phone calls?</small>
                                        <div class="d-flex">
                                        <input type="radio" id="html" name="phonecall" value="1" @if( isset($price->phone) && $price->phone=="1")  checked @endif>
                                        <label for="html" class="mr-2">Yes</label><br>
                                        <input type="radio" class="" id="css" name="phonecall" value="0" @if( isset($price->phone) && $price->phone=="0")  checked @endif>
                                        <label for="css">No</label><br>
                                        </div>
                                      </div>
                                <ul class="list-unstyled card-body mb-0 pb-0">
                                  <li class="">
                                    <small class="text-muted">How much do you want to charge per minute for incoming phone calls?</small>
                                
                                    <div class="form-group mt-4">
                                        <div class="slider-round" id="slider-round-6"></div>
                                        <input type="hidden" id="hidden-input-range5" name="phonecallprice">
                                        <div class="card-text d-flex justify-content-between mt-3">
                                            <p class="text-muted">Min $1.00</p>
                                            <p class="text-muted">Max $10.00</p>
                                        </div>
                                    </div>
                              
                                   

                                  </li>
                                  <li class="">
                                    <small class="text-muted">What is the minimum call time?</small>
                                
                    <div class="form-group mt-4">
                        <div class="slider-round" id="slider-round-7"></div>
                        <input type="hidden" id="hidden-input-range6" name="phonecalltime">
                        <div class="card-text d-flex justify-content-between mt-3">
                            <p class="text-muted">Min 1 Minute</p>
                             <p class="text-muted">Max 5 Minute</p>
                        </div>
                    </div>
              
                                   

                                  </li>
                               
                                </ul>
                              </div>
                            </div>
                            <div>
                            </div>
                          </div>
                        </div>
                      </div><div class="row">
                          <div class="col-lg-12 col-md-12">
                            <div class="card ">
                              <div class="card-body text-white">

                               <div class="card">
                                <div class=" d-flex justify-content-between">
                                    
                                 <small class="card-header p-0">Do you want to accept video calls?</small>
                                        <div class="d-flex">
                                        <input type="radio" id="yes" name="videocall" value="1" @if( isset($price->video) && $price->video=="1")  checked @endif>
                                        <label for="yes" class="mr-2">Yes</label><br>
                                        <input type="radio" id="no" name="videocall" value="0" @if( isset($price->video) && $price->video=="0")  checked @endif>
                                        <label for="no">No</label><br>
                                        </div>
                                      </div>
                                      <ul class="list-unstyled card-body mb-0 pb-0">
                                  <li class="">
                                    <small class="text-muted">How much do you want to charge per minute for incoming video calls?</small>
                                
                    <div class="form-group mt-4">
                        <div class="slider-round" id="slider-round-8"></div>
                        <input type="hidden" id="hidden-input-range7"  name="videocallprice">
                        <div class="card-text d-flex justify-content-between mt-3">
                            <p class="text-muted">Min $1.00</p>
                             <p class="text-muted">Max $30.00</p>
                        </div>
                    </div>
              
                                   

                                  </li>
                                  <li class="">
                                    <small class="text-muted">What is the minimum video call time?</small>
                                
                    <div class="form-group mt-4">
                        <div class="slider-round" id="slider-round-9"></div>
                        <input type="hidden" id="hidden-input-range8" name="videocalltime"value="" >
                        <div class="card-text d-flex justify-content-between mt-3">
                        <p class="text-muted">Min 1 Minute</p>
                             <p class="text-muted">Max 5 Minute</p>
                        </div>
                    </div>
              
                                   

                                  </li>
                               
                                </ul>
                              </div>
                            </div>
                            <div>
                            </div>
                          </div>
                        </div>
                      </div>

                        <div class=" align-right ml-auto">
                          <button type="submit" class="btn feel-btn ">UPDATE</button>
                        </div>
                        </form>
                      </div>

                    </div>
                  </div>
                
          


    <script>

    window.onload = function() {

            // Scripts de los Sliders
            const hiddenInputRange1 = document.getElementById("hidden-input-range1");
            const hiddenInputRange2 = document.getElementById("hidden-input-range2");
            const hiddenInputRange3 = document.getElementById("hidden-input-range3");
            const hiddenInputRange4 = document.getElementById("hidden-input-range4");
            const hiddenInputRange5 = document.getElementById("hidden-input-range5");
            const hiddenInputRange6 = document.getElementById("hidden-input-range6");
            const hiddenInputRange7 = document.getElementById("hidden-input-range7");
            const hiddenInputRange8 = document.getElementById("hidden-input-range8");
            const slider2 = document.getElementById('slider-round-2');
            const slider3 = document.getElementById('slider-round-3');
            const slider4 = document.getElementById('slider-round-4');
            const slider5 = document.getElementById('slider-round-5');
            const slider10 = document.getElementById('slider-round-6');
            const slider7 = document.getElementById('slider-round-7');
            const slider8 = document.getElementById('slider-round-8');
            const slider9 = document.getElementById('slider-round-9');

            // const calculoResultado = document.getElementById('calculoResultado');
            const frecuenciaParaPagar = document.getElementById('frecuenciaParaPagar');
            const plazoParaPagar = document.getElementById('plazoParaPagar');
            const pagoFrecuencia = document.getElementById('pagoFrecuencia');
            const pagoCuota = document.getElementById('pagoCuota');
            const checkMensual = document.getElementById('formCheckMensual');
            const checkQuincenal = document.getElementById('formCheckQuincenal');
            const gastosDeCierre = 500;
            const tasaMensual = 0.06;
            const tasaQuincenal = 0.03;

            const currency = function(number){return new Intl.NumberFormat('es-DO', {style: 'currency',currency: 'DOP', minimumFractionDigits: 2}).format(number)}; // Funcion que sirve para dar formato de moneda local

            let prestamo;
            let interes;
            let monto;
            let plazo;
            let tasa;
            let frecuencia;
            let frecuenciaLiteral;
            let capitalCuota;
            let montoCuota;
            


            // Slider 2
            noUiSlider.create(slider2, {
                range: {
                    'min': 1,
                    'max': 5
                },
                start: [0],
                step: 0.25,
                connect: 'lower',
                tooltips:true,
            });
            // Slider 2
            noUiSlider.create(slider3, {
                range: {
                    'min': 1,
                    'max': 10
                },
                start: [0],
                step:0.25,
                connect: 'lower',
                tooltips:true,
            });
                // Slider 2
                noUiSlider.create(slider4, {
                range: {
                    'min': 1,
                    'max': 20
                },
                start: [0],
                step: 0.25,
                connect: 'lower',
                tooltips: true,
            });
             // Slider 2
             noUiSlider.create(slider5, {
                range: {
                    'min': 1,
                    'max': 20
                },
                start: [0],
                step: 0.25,
                connect: 'lower',
                tooltips:true,
            });
            // Slider 2
            noUiSlider.create(slider10, {
                range: {
                    'min': 1,
                    'max': 10
                },
                start: [0],
                step: 0.25,
                connect: 'lower',
                tooltips: true,
            });
            // Slider 2
            noUiSlider.create(slider7, {
                range: {
                    'min': 1,
                    'max': 5
                },
                start: [0],
                step:1,
                connect: 'lower',
                tooltips: true,
            });
                       // Slider 2
            noUiSlider.create(slider8, {
                range: {
                    'min': 1,
                    'max': 30
                },
                start: [0],
                step: 0.25,
                connect: 'lower',
                tooltips: true,
            });
            // Slider 2
            noUiSlider.create(slider9, {
                range: {
                    'min': 1,
                    'max': 5
                },
                start: [0],
                step:1,
                connect: 'lower',
                tooltips: true,
            });


         
            <?php $a=$price->cost_msg ?>
            
            slider2.noUiSlider.set({{ isset($a)?$a:'10' }});
            slider2.noUiSlider.on('update', function () {
                valuePlazo = slider2.noUiSlider.get();
                hiddenInputRange1.value = valuePlazo;
            });
            <?php $a=$price->cost_pic ?>
            slider3.noUiSlider.set({{ isset($a)?$a:'10' }});
            slider3.noUiSlider.on('update', function () {
                valuePlazo = slider3.noUiSlider.get();
                hiddenInputRange2.value = valuePlazo;
            });
            <?php $a=$price->cost_audiomsg ?>
            slider4.noUiSlider.set({{ isset($a)?$a:'10' }});
            slider4.noUiSlider.on('update', function () {
                valuePlazo = slider4.noUiSlider.get();
                hiddenInputRange3.value = valuePlazo;
            });
            <?php $a=$price->cost_videomsg ?>
            slider5.noUiSlider.set({{ isset($a)?$a:'10' }});
            slider5.noUiSlider.on('update', function () {
                valuePlazo = slider5.noUiSlider.get();
                hiddenInputRange4.value = valuePlazo;
            });
            <?php $a=$price->min_call_time ?>
            slider7.noUiSlider.set({{ isset($a)?$a:'10' }});
            slider7.noUiSlider.on('update', function () {
                valuePlazo = slider7.noUiSlider.get();
                hiddenInputRange6.value = valuePlazo;
            });
            <?php $a=$price->cost_videocall ?>
            slider8.noUiSlider.set({{ isset($a)?$a:'10' }});
            slider8.noUiSlider.on('update', function () {
                valuePlazo = slider8.noUiSlider.get();
                hiddenInputRange7.value = valuePlazo;
            });
            <?php $a=$price->min_videocall_time ?>
            slider9.noUiSlider.set({{ isset($a)?$a:'10' }});
            slider9.noUiSlider.on('update', function () {
                valuePlazo = slider9.noUiSlider.get();
                hiddenInputRange8.value = valuePlazo;
            });
            <?php $a=$price->cost_audiocall ?>
            slider10.noUiSlider.set({{ isset($a)?$a:'10' }});
            slider10.noUiSlider.on('update', function () {
                valuePlazo = slider10.noUiSlider.get();
                hiddenInputRange5.value = valuePlazo;
            });

            // checkMensual.addEventListener('change', function () {
            //     valuePlazo = hiddenInputRange.noUiSlider.get();
            // });

            // checkQuincenal.addEventListener('change', function () {
            //     valuePlazo = hiddenInputRange.noUiSlider.get();
            // });

            
              
                     
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


@endsection
@section('scripts')
@parent
@endsection