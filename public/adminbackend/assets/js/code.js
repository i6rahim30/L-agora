$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Deleting This Might Cause Other Records To Be Deleted",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#BFA280',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });

// confirm Order
  $(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure to Confirm?',
                    text: "Once You Confirm, Find The Order in The Confirmed Page",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#10a30c',
                    cancelButtonColor: '#BFA280',
                    confirmButtonText: 'Yes, Confirm!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Confirmed!',
                        'Status Changed.',
                        'success'
                      )
                    }
                  }) 


    });

  });

// processing Order
  $(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure to Process?',
                    text: "Once You Process, Find The Order in The Processing Page",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#10a30c',
                    cancelButtonColor: '#BFA280',
                    confirmButtonText: 'Yes, Process!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Processing!',
                        'Status Changed.',
                        'success'
                      )
                    }
                  }) 


    });

  });

// delivered Order
  $(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure about the Delivery?',
                    text: "Once You Process, Find The Order in The Delivered Page",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#10a30c',
                    cancelButtonColor: '#BFA280',
                    confirmButtonText: 'Yes, Deliver!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Delivering!',
                        'Status Changed.',
                        'success'
                      )
                    }
                  }) 


    });

  });

// return approve Order
  $(function(){
    $(document).on('click','#approved',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure to approve?',
                    text: "Once You Approve, Find The Order in The Returned Page",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#10a30c',
                    cancelButtonColor: '#BFA280',
                    confirmButtonText: 'Yes, Return!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Returned!',
                        'Status Changed.',
                        'success'
                      )
                    }
                  }) 


    });

  });

