@extends('layout')

@section('content')
    <style>
        @media (max-width: 767.98px) {
            .border-sm-start-none {
                border-left: none !important;
            }
        }
      .custom-button {
        position: relative;
        overflow: hidden;
        border-radius: 8px; 
        background-size: cover;
        background-position: center;
        transition: transform 0.3s ease-in-out;
        }
      .custom-button:hover {
        transform: scale(1.15);
        }
      .content {
            padding-top: 60px; 
        }
  </style>

<section class="content">
    <h1 class="fs-1 mt-5 text-center">منتجاتنا</h1>
    <div class="container py-5">
        <div class="row shadow-sm p-3 my-3 bg-white rounded">
        
        @foreach ( $products as $product )
            <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow border rounded-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="custom-button rounded">
                                        <img width="280px" height="200px" src="{{ asset('images') }}/{{ $product->image }}"
                                            class="w-100 h-100" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6 mt-2">

                                    <h3>{{ $product->name }}</h3>

                                    <div class="mt-3 mb-0 fs-5 mt-1">

                                        {{ $product->short_description }}

                                    </div>
                                    <p class="text-truncate mb-4 mb-md-0 mt-2">

                                        {{ $product->long_description }}

                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="mb-1 mt-2">
                                        <h4 class="mb-1 pt-1 me-4">
                                            {{ $product->price }}$
                                        </h4>
                                    </div>
                                    <h6 
                                        @if ($product->statue)
                                           class='p-4 text-success'
                                        @else
                                            class='p-4 text-danger'
                                        @endif
                                    >
                                        @if ($product->statue)
                                            الكمية متوفرة
                                        @else
                                            تم نفاذ الكمية
                                        @endif
                                    </h6>
                                    <div class="d-flex flex-column">
                                        <button 
                                            @if ($product->statue)
                                              onclick="success()"
                                            @else
                                              onclick="error()"
                                            @endif
                                             
                                            class="d-flex justify-content-evenly align-items-center btn btn-outline-secondary btn-sm" type="button" name="submit">
                                          <p class="pt-3 fs-5 px-1">اطلب الان</p>
                                          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: 0.2s;msFilter:;"><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="17.5" cy="19.5" r="1.5"></circle><path d="M21 7H7.334L6.18 4.23A1.995 1.995 0 0 0 4.333 3H2v2h2.334l4.743 11.385c.155.372.52.615.923.615h8c.417 0 .79-.259.937-.648l3-8A1.003 1.003 0 0 0 21 7zm-4 6h-2v2h-2v-2h-2v-2h2V9h2v2h2v2z"></path></svg>
                                        </button>
                                        <script>

                                          function success() {
                                                Swal.fire({
                                                    title: ' ادخل معلوماتك لاستلام الطلبية',
                                                    html:
                                                        '<label for="swal-input1">الاسم الأول</label>' +
                                                        '<input id="swal-input1" class="swal2-input" placeholder="ادخل اسمك">' +
                                                        '<label for="swal-input2">اسم العائلة</label>' +
                                                        '<input id="swal-input2" class="swal2-input" placeholder="اسم العائلة">' +
                                                        '<label for="swal-input3">رقم الواتساب</label>' +
                                                        '<input id="swal-input3" class="swal2-input" placeholder="رقم الواتساب">' +
                                                        '<label for="swal-input4">يوزرك في اللعبة</label>' +
                                                        '<input id="swal-input4" class="swal2-input" placeholder="يوزرك في اللعبة">',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'ارسل طلبك',
                                                    cancelButtonText: 'إلغاء',
                                                    showLoaderOnConfirm: true,
                                                    preConfirm: () => {
                                                        // const name = document.getElementById('swal-input1').value;
                                                        // const lastName = document.getElementById('swal-input2').value;
                                                        // const whatsapp = document.getElementById('swal-input3').value;
                                                        // const gameUsername = document.getElementById('swal-input4').value;
                                                    

                                                        return new Promise(resolve => {
                                                            setTimeout(() => {
                                                                resolve();
                                                            }, 2000); 
                                                        });
                                                    },
                                                    allowOutsideClick: () => !Swal.isLoading()
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        Swal.fire(
                                                            'تم إرسال الطلب!',
                                                            'شكرًا لك، سيتم التواصل معك قريبًا.',
                                                            'success'
                                                        );
                                                    }
                                                });}
                                                
                                          function error() {
                                                Swal.fire({
                                                icon: 'warning',
                                                title: 'تم نفاذ الكمية',
                                                text: 'عذراً، تم نفاذ الكمية المتوفرة من هذا المنتج.',
                                                confirmButtonText: 'حسناً'
                                            });}

                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    </section>
@endsection
