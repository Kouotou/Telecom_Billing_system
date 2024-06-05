document.addEventListener('DOMContentLoaded', function() {
    // Toggle Add Subscriber Form
    var toggleAddSubscriberFormButton = document.getElementById('toggleAddSubscriberForm');
    if (toggleAddSubscriberFormButton) {
        toggleAddSubscriberFormButton.addEventListener('click', function() {
            var form = document.getElementById('addSubscriberForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
    }

    // Toggle Add Service Form
    var toggleAddServiceFormButton = document.getElementById('toggleAddServiceForm');
    if (toggleAddServiceFormButton) {
        toggleAddServiceFormButton.addEventListener('click', function() {
            var form = document.getElementById('addServiceForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
    }

    // Search Subscribers
    var searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            var filter = searchInput.value.toLowerCase();
            var tableBody = document.getElementById('subscriberTableBody');
            var rows = tableBody.getElementsByTagName('tr');

            Array.from(rows).forEach(function(row) {
                var nameCell = row.getElementsByTagName('td')[1];
                var phoneCell = row.getElementsByTagName('td')[2];
                var name = nameCell ? nameCell.textContent.toLowerCase() : '';
                var phone = phoneCell ? phoneCell.textContent.toLowerCase() : '';

                if (name.includes(filter) || phone.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});

function editSubscriber(id, name, phone, address, service) {
    document.getElementById('editId').value = id;
    document.getElementById('editName').value = name;
    document.getElementById('editPhone').value = phone;
    document.getElementById('editAddress').value = address;
    document.getElementById('editService').value = service;
    document.getElementById('editSubscriberForm').style.display = 'block';
}

function editService(id, name, Description, Cost) {
    document.getElementById('editId').value = id;
    document.getElementById('editName').value = name;
    document.getElementById('editDescription').value = Description;
    document.getElementById('editCost').value = Cost;
    document.getElementById('editServiceForm').style.display = 'block';
}