<script>
    let sale_id;

    const create = () => {
        $('#createForm').trigger('reset');
        $('#createModal').modal('show');
    }

    const deleteData = (id) => {
        Swal.fire({
            title: 'Apa anda yakin untuk menghapus penjualan ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            Swal.close();

            if (result.value) {
                Swal.fire({
                    title: 'Mohon tunggu',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willOpen: () => {
                        Swal.showLoading()
                    }
                });

                $.ajax({
                    type: "delete",
                    url: `/sale/${id}`,
                    dataType: "json",
                    success: function(response) {
                        Swal.close();
                        if (response.status) {
                            Swal.fire(
                                'Success!',
                                response.msg,
                                'success'
                            )
                            $('#table').DataTable().ajax.reload();
                        } else {
                            Swal.fire(
                                'Error!',
                                response.msg,
                                'warning'
                            )
                        }
                    }
                });
            }
        });
    }

    // const edit = (id) => {
    //     Swal.fire({
    //         title: 'Mohon tunggu',
    //         showConfirmButton: false,
    //         allowOutsideClick: false,
    //         willOpen: () => {
    //             Swal.showLoading()
    //         }
    //     });
    //     product_id = id;

    //     $.ajax({
    //         type: "get",
    //         url: `/product/${product_id}`,
    //         dataType: "json",
    //         success: function(response) {
    //             $('#name-edit').val(response.name);
    //             $('#category-edit').val(response.category_id);
    //             $('#price-edit').val(response.price);
    //             $('#stock-edit').val(response.stock);
    //             $('#description-edit').val(response.description);


    //             Swal.close();
    //             $('#editModal').modal('show');
    //         }
    //     })
    // }

    $(function() {

        $('#quantity').on('keyup', function() {
            var quantity = parseInt($(this).val());

            var total = parseInt($('#price').val()) * quantity;

            $('#total').val(total);
        })
        $('#product').on('change', function() {

            var product_id = $(this).val();
            Swal.fire({
                title: 'Mohon tunggu',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({

                type: "get",
                url: `/product/${product_id}`,
                dataType: "json",
                success: function(response) {
                    // var quantity = $('#quantity').val();
                    // var total = $('#total').val();
                    $('#category').val(response.category_id);
                    $('#price').val(response.price);
                    Swal.close();
                }
            })
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('#table').DataTable({
            dom: 'Bfrtip',
            // Configure the drop down options.
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength', 'excel', 'pdf', 'print'
            ],
            filter: true,
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: '{{ route('sale.data') }}'
            },
            "columns": [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'category_id',
                },
                {
                    data: 'product_id'
                },
                {
                    data: 'price',
                },
                {
                    data: 'quantity',
                },
                {
                    data: 'total',
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                },

            ]
        });

        $('#createSubmit').click(function(e) {
            Swal.fire({
                title: 'Apa anda yakin untuk menjual produk ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                Swal.close();

                if (result.value) {
                    e.preventDefault();
                    var formData = $('#createForm').serialize();

                    Swal.fire({
                        title: 'Mohon tunggu',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        willOpen: () => {
                            Swal.showLoading()
                        }
                    });

                    $.ajax({
                        type: "post",
                        url: "/sale",
                        data: formData,
                        dataType: "json",
                        cache: false,
                        processData: false,
                        success: function(data) {
                            Swal.close();

                            if (data.status) {
                                Swal.fire(
                                    'Success!',
                                    data.msg,
                                    'success'
                                )

                                $('#createModal').modal('hide');
                                $('#table').DataTable().ajax.reload();
                            } else {
                                Swal.fire(
                                    'Error!',
                                    data.msg,
                                    'warning'
                                )
                            }
                        }
                    });
                }
            });
        });

        // $('#editSubmit').click(function(e) {
        //     e.preventDefault();

        //     var formData = new FormData($('#editForm')[0]);

        //     Swal.fire({
        //         title: 'Mohon tunggu',
        //         showConfirmButton: false,
        //         allowOutsideClick: false,
        //         willOpen: () => {
        //             Swal.showLoading()
        //         }
        //     });

        //     $.ajax({
        //         type: "post",
        //         url: `/product/${product_id}`,
        //         data: formData,
        //         dataType: "json",
        //         cache: false,
        //         processData: false,
        //         contentType: false,
        //         success: function(data) {
        //             Swal.close();

        //             if (data.status) {
        //                 Swal.fire(
        //                     'Success!',
        //                     data.msg,
        //                     'success'
        //                 )
        //                 supplier_id = null;
        //                 $('#editModal').modal('hide');
        //                 $('#table').DataTable().ajax.reload();
        //             } else {
        //                 Swal.fire(
        //                     'Error!',
        //                     data.msg,
        //                     'warning'
        //                 )
        //             }
        //         }
        //     });
        // });
    });
</script>
