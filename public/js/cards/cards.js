new Vue({
	el: 'body',
	 data: {
    cards: [],
    "total": '',
    "per_page": '',
    reset_url: '',
    count_links: ''
   },
	ready: function()
	{
    this.main();
    
	},
  methods:{

    paginate:  function(page)
    {

      this.next_page_url = this.next_page_url + page ;
      console.log(this.next_page_url  );
      this.$http.get(this.next_page_url , function(cards){
              this.cards = cards.data;
              if(cards.next_page_url){
                this.next_page_url = cards.next_page_url.slice(0 , 40);
              }
              if(!cards.next_page_url)
              {
                this.next_page_url  = this.reset_url ;
              }
        });

    },
    main: function()
    {

      var self = this;
      this.$http.get('/cards/totals' , function(cards){
      this.cards = cards.data; 
      self.total = cards.total; // Get the total of data that comming from ajax call
      self.next_page_url= cards.next_page_url.slice(0 , 40); // Adapt your url length
      self.per_page = cards.per_page; // How many items display per page comes from ajax call
      self.reset_url = cards.next_page_url.slice(0 , 40);
      this.count_links =  Math.ceil((this.total  /this.per_page) + 1); // Determine how links create
    });

    }
  
  }
})