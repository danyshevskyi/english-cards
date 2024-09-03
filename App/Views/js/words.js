async function getWords(start = null, end = null, option = null) {

	$('html,body').scrollTop(0);

	let category = $('#category').val();

	let sendData = {
						"key": "getWords",
						"category": category,
						"start": start,
						"end": end,
						"option": option
					};

	let response = await fetch (
        'https://dov.pp.ua/english-cards/',
        {
            method: 'POST',  
            headers:
                    {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
            body: JSON.stringify(sendData)
        }
    );

    let getData = await response.json();

	// Initial state of the  DOM
	$('#insCard').html(null);

	// Filling word count
	$('#word_count').html(getData['count']['total']);

	// Filling word count by category
	wordCountByCategoty(getData['count']['category']);

	// Check request status
	if(getData['status'])
	{		
		// Filling count of pages
		$('#current').html(getData['pages']['current']);
			$('#total').html(getData['pages']['total']);
				$('#pageSort').show();

		// Inserting data into a card
		for(i in getData['words'])
		{			
			$('#myCard div:nth-child(1)').html(getData['words'][i]['native']);
				$('#myCard div:nth-child(2)').html(getData['words'][i]['translate']);
					$('#myCard div:nth-child(3)').html(getData['words'][i]['sentence']);
						$('#myCard div:nth-child(4)').html(getData['words'][i]['id_words']);
							$('#myCard div:nth-child(5) span').html(getData['words'][i]['card_number']);

					let clone = $('#myCard').clone();

						$('#insCard').append(clone.toggle().removeAttr('id'));
							clone.on('click', clickCard);
  		}
			
		// Arrow back
		if(getData['pages']['current'] == 1)
		{
			$('#back').attr("onclick", "null");
				$('#back').addClass('opacity-25');				
		}
		else
		{
			// Deactivating buttons
			$('#back').attr("onclick", "getWords(null, "+ getData['end'] +", null)");
				$('#back').removeClass('opacity-25');
		}	
			
		// Arrow next
		if(getData['pages']['current'] == getData['pages']['total'])
		{	
			$('#next').attr("onclick", "null");
				$('#next').addClass('opacity-25');
		}
		else
		{
			// Deactivating buttons
			$('#next').attr("onclick", "getWords("+ getData['start'] +", null, null)");
				$('#next').removeClass('opacity-25');
		}
		
			// Button mode show
			$('#butMode').show();
	}
	else
	{
	// Mode add new word
		// Show add new word
		cloneTextAdd = $('#textAdd').clone();
			$('#insCard').append(cloneTextAdd.toggle().removeAttr('id'));
		// Hide block pages
		$('#pageSort').hide();
		// Deactivating buttons
		$('#next').attr("onclick", "null");
			$('#next').addClass('opacity-25');
				$('#back').attr("onclick", "null");
					$('#back').addClass('opacity-25');
		// Button mode show
		$('#butMode').hide();
	}
}

function wordCountByCategoty(wordsByCategory) {
	optionsArr = $("select > option");	
		for(let i = 0; i < wordsByCategory.length; i++)
		{
			// Filling word count in options
			for(let x = 0; x < optionsArr.length; x++)
			{
				if(optionsArr[x].value == wordsByCategory[i][0])
				{					
					optionsArr[x].innerHTML = wordsByCategory[i][1] + ' (' + wordsByCategory[i][2] + ')';
				}
			}		
		}
}

async function addWords() {
	$('#mod_add_words').modal('hide');

	let native = $('#native');
		let translate = $('#translate');
			let sentence = $('#sentence');
				let category = $('#categoryAdd');

	let sendData =
	{
		"key" : "addWords",
		"native" : native.val(),
		"translate" : translate.val(),
		"sentence" : sentence.val(),
		"category" : category.val()
	}
		// RestApi
		let getData = await restApi('english-cards/', sendData);
			if(!getData['status'])
			{
				alert ('The word or phrase "' + getData['translate'] +'" already exists in this category!');
			}
			else
			{				
				selectOption(category.val(), 'all');
					getWords(null, null, 'end');
					
				// clear form
				native.val(null);
					translate.val(null);
						sentence.val(null);
			}
	$('html,body').scrollTop(99999);
}

async function restApi(project, dataObject) {
	let response = await fetch (
        'https://dov.pp.ua/' + project,
        {
            method: 'POST',  
            headers:
                    {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
            body: JSON.stringify(dataObject)
        }
    );
		let getData = await response.json();	

			return getData;
}

async function editWords() {
	$('#mod_edit_words').modal('hide');

	let native = $('#native_edit');
		let translate = $('#translate_edit');
			let sentence = $('#sentence_edit');
				let category = $('#categoryAdd_edit');
					let id_words = $('#id_words_edit');
	let sendData =
	{
		"key" : "editWords",
		"native" : native.val(),
		"translate" : translate.val(),
		"sentence" : sentence.val(),
		"category" : category.val(),
		"id_words" : id_words.html()
	}

	let response = await fetch (
        'https://dov.pp.ua/english-cards/',
        {
            method: 'POST',  
            headers:
                    {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
            body: JSON.stringify(sendData)
        }
    );

	let getData = await response.json();

		if(!getData['status'])
		{
			alert ('Слово '+ getData['native'] + ' (' + getData['translate'] + ') вже існує у цій категорії!');
		}
		else
		{
			selectOption(category.val(), 'all');
				getWords(start = id_words.html() - 1, option = null);		
		}
}

async function delWords() {
    if(confirm('The selected word will be deleted! Are you sure?'))
	{
    	$('#mod_edit_words').modal('hide');
    
		let id_words = $('#id_words_edit');

		let sendData =
					{
						"key" : "delWords",
						"id_words" : id_words.html()
					}

		await fetch (
	        'https://dov.pp.ua/english-cards/',
	        {
	            method: 'POST',  
	            headers:
	                    {
	                        'Content-Type': 'application/json;charset=utf-8'
	                    },
	            body: JSON.stringify(sendData)
	        }
	    ).then(function(){
	    	getWords(null, null, 'end');	
	    });
	}
}

function pageSort(sort) {
	getWords(start = null, end = null, sort);
		if(sort === 'start')
		{
			$('#pageSort').attr("onclick", "pageSort('end')");
		}
		else
		{
			$('#pageSort').attr("onclick", "pageSort('start')");
		}
}

function mode(mode) {
	if(mode === 0)
	{
		$('.trainMode').show();
			$('.translate').show();
				$('.sentence').show();
					$('#butMode').attr("onclick", "mode(1)");
	}
	else if(mode === 1)
	{
		$('.trainMode').hide();
			$('.translate').hide();
				$('.sentence').hide();
					$('#butMode').attr("onclick", "mode(2)");

	}
	else if(mode === 2)
	{
		$('.trainMode').hide();
			$('.sentence').show();
				$('#butMode').attr("onclick", "mode(0)");		
	}
}

function clickCard() {
	if($('#menu').is(':visible'))
	{
		$(document).ready(function(){
        	$('#mod_edit_words').modal('show');
        });
		// Filling data for mod_edit_words
		$('#translate_edit').val($(this).children('.english').html());
			$('#native_edit').val($(this).children('.translate').html());
				$('#sentence_edit').val($(this).children('.sentence').html());
					$('#id_words_edit').html($(this).children('.id_words').html());
	}
	else
	{
		$(this).children('.translate').toggle();
	}
}

function selectInit(id) {
	$('#'+id).html(null);
		let clone = $('#cloneCategory').clone();
			clone.attr( "id", "category" );
				$('#'+id).html(clone.show());
}

async function makeSelect() {
	let defaultCategory = null;

	// Get category
	let sendData = {
						"key": "getCategory",
					};

	let response = await fetch (
        'https://dov.pp.ua/english-cards/',
        {
            method: 'POST',  
            headers:
                    {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
            body: JSON.stringify(sendData)
        }
    );

    let getData = await response.json();
		
		// Make category
		let categoriesArr = getData;
			
			let select;	
				let option = $('#option');

			for(x = 1; 4 >= x; x++)
			{
				// Main select
				if(x === 1)
				{	
					selectInit('divSelectMain');	
						select = $('#category');	

							// Create listener for main select
							select.on('change', function() {
								
								if($('#category').val() == 0)
								{
									$('#mod_category_add').modal('show');
								
								}
								else if ($('#category').val() == 'del')
								{
												$('#mod_category_del').modal('show');
								}
								else
								{								
										selectOption($('#category').val(), 'all');
											getWords(null, null, 'end');
								}
							});
				}
				else if (x === 2)
				{
					selectInit('categoryAdd');
					select = $('#categoryAdd');
				}
				else if (x === 3)
				{
					selectInit('categoryAdd_edit');
					select = $('#categoryAdd_edit');
				} 
				else if (x === 4)
				{
					selectInit('category_del');
					select = $('#category_del');
				}
					// Filling select
					for (i = 0; categoriesArr.length > i ; i++) {

						let clone = option.clone();
							
						select.prepend(clone.val(categoriesArr[i][0]).html(categoriesArr[i][1]).removeAttr('id'));
									
						clone.html(categoriesArr[i][1]);
					
							if(categoriesArr[i][2] == 1)
							{
								defaultCategory = categoriesArr[i][0];	
							}
					}			
			}
	selectOption(defaultCategory, 'all');
}

function selectOption(selectVal, key) {
	let optionsArr = null;
	
		if(key == 'all')
		{
			optionsArr = $("select > option");			
		} 
		else if(key == 'main')
		{
			optionsArr = $("#categoryAdd > option, #categoryAdd_edit > option, #category_del > option");
		}

		for(i = 0; i < optionsArr.length; i++)
		{	
			if(optionsArr[i].value == selectVal)
			{
				optionsArr[i].selected = true;
			}
		}
}

async function addCategory() {
	let category = $('#category_add');

	let sendData =
	{
		"key" : "addCategory",
		"category" : category.val(),
	}

	let response = await fetch (
        'https://dov.pp.ua/english-cards/',
        {
            method: 'POST',  
            headers:
                    {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
            body: JSON.stringify(sendData)
        }
    );

	let getData = await response.json();

		if(!getData['status'])
		{
			
			alert ('The category ' + category.val() + ' already exists!');
		
		}
		else
		{
			makeSelect().then(function() {
	
				// Get category name, hide modal and clean input
					$('#mod_category_add').modal('hide');
						$('#category_add').val(null);

					selectOption(getData['id_category'], 'all');
						getWords(null, null, 'end');
				});
		}
}

async function delCategory() {
	let categoryId = $('#category_del').val();

	if(categoryId == 1)
	{
		alert('Sorry, this default category cannot be deleted!');
	}
	else
	{
		if(confirm('Warning! The selected category and all the words in it will be deleted! Are you sure?'))
		{
			// Send data
			let sendData =
			{
				"key" : "delCategory",
				"categoryId" : categoryId,
			}
	
			let response = await fetch (
			    'https://dov.pp.ua/english-cards/',
			    {
			        method: 'POST',  
			        headers:
			                {
			                    'Content-Type': 'application/json;charset=utf-8'
			                },
			        body: JSON.stringify(sendData)
			    }
			);

			// Get result
			let getData = await response.json();
	
			// Check result
			if(getData['status'])
			{
				location.replace('https://dov.pp.ua/english-cards/');	
			}
		}
	}
}

// autostart
makeSelect().then(function() {
	getWords(null, null, 'end');
});
