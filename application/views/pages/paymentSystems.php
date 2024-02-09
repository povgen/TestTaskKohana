<div class="row justify-content-center">
    <div class="col-8">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" onclick="openModal()">
                    <i class="bi bi-plus-lg"></i>
                    Add payment system
                </button>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col" style="width: 30px">Options</th>
            </tr>
            </thead>
            <tbody id="payment_system_rows">
                <!-- filled with drawTableRows function below-->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_label"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="error_message" role="alert"></div>
                <div class="row">
                    <div class="col-4">
                        <label for="payment_system_title">Title</label>
                    </div>
                    <div class="col">
                        <input type="hidden" id="payment_system_id">
                        <input type="text" class="form-control" id="payment_system_title">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveItem()">Save</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let paymentSystems = []

   function openModal (item_index = null) {
       $('#error_message').hide()
        if (item_index) {
            $('#modal_label').text('Edit payment system')
            const item = paymentSystems[item_index]
            $('#payment_system_title').val(item.title)
            $('#payment_system_id').val(item.id)
        } else {
            $('#modal_label').text('Add new payment system')
            $('#payment_system_title').val('') // drop old values
            $('#payment_system_id').val('') // drop old values
        }

        $('#modal').modal('show');
    }   

    async function saveItem () {

        const errorBox = $('#error_message')


        const title = $('#payment_system_title').val()
        if (!title) {
            errorBox.text('Please fill the title');
            errorBox.show();
            return
        }

        if (title.length > 100) {
            errorBox.text('Max allowed length 100 symbols');
            errorBox.show();
            return
        }


        const response = await fetch('/PaymentSystemAPI/savePaymentSystem/', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id: $('#payment_system_id').val(),
                title: title
            })
        })
        switch (response.status) {
            case 200:
                $('#modal').modal('hide')
                loadPaymentSystemList()
            break;
            default:
                console.error('Some unexpected error...')
        }

    }


    function drawTableRows() {
        const table = $('#payment_system_rows')
        table.html('')
        paymentSystems.forEach((item, index) => {
            table.append(`
                <tr>
                    <th scope="row">${index + 1}</th>
                    <td>${item.title}</td>
                    <td><!-- Example single danger button -->
                        <div class="btn-group">
                            <i class="bi bi-list dropdown-toggle fs-4"
                               data-bs-toggle="dropdown"
                               style="cursor: pointer;"
                            ></i>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="openModal(${index})">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            `)
        })
    }

    async function loadPaymentSystemList() {
        const response = await fetch('/PaymentSystemAPI/getPaymentSystemList/');
        console.log(response)
        paymentSystems = await response.json()
        drawTableRows()
    }

    $(function() {
        loadPaymentSystemList()
    });
</script>


