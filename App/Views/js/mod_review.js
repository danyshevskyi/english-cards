async function reviewAdd() {
    let sendData =
	{
		'key': 'review_add',
		'project': 'english-cards',
		'message': $('#message').val()
	}
    await fetch ( 'https://dov.pp.ua/review',
                {
                    method: 'POST',  
                    headers:
                        {
                            'Content-Type': 'application/json;charset=utf-8'
                        },
                    body: JSON.stringify(sendData)
                }
    );
    // Clear message in input
    $('#message').val(null);
        // Hide mod_review and show mod_review_ok
        $('#mod_review').modal('hide');
            $('#mod_review_ok').modal('show');
};
