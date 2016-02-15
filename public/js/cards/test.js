new Vue({
	el: '#cards',
	 data: {
    cards: [],
    "total": '',
    "per_page": '',
    "current_page": '',
    "last_page": '',
    "next_page_url": '',
    "prev_page_url": null,
    "from": '',
    "to": '',
   },
	ready: function()
	{
       var self = this;
		this.$http.get('/cards/totals' , function(cards){
			this.cards = cards.data; 
      self.from = cards.from; //desde
      self.to = cards.to; // a
      self.total = cards.total; // a
      self.next_page_url= cards.next_page_url; //next_page_url
      self.per_page = cards.per_page; // per page
		
      // Determine how many links create
      for(var  i = 1; i <= Math.round(this.total /this.per_page) ; i++){
         $( ".pagination" ).append
        ( "<li><a href=" + '#' + ">" + i+ "</a></li>" ).click(function(){
                // second ajax
              self.$http.get(self.next_page_url, function(cards){
              self.cards = cards.data;
              self.next_page_url = cards.next_page_url;
              console.log(self.next_page_url); 
            });
                // second ajax
        });

        self.to = this.to +1;

        
      } //end for

      //last link
      $( ".pagination" ).append
        ( "<li><a href=" + '#' + ">" + i+ "</a></li>" ).click(function(e){
                // second ajax
              alert(e);
              self.$http.get(self.next_page_url, function(cards){
              self.cards = cards.data;
              self.next_page_url = cards.next_page_url;
              console.log(self.next_page_url); 
            });
                // second ajax
        });
		});

    
	},
  methods:{
    addli:  function()
    {
      /*
      var go_to = this.next_page_url ;
      var self = this;
      //( "<li><a href=" + go_to + ">" + this.to + "</a></li>" )
      $( ".pagination" ).append
      ( "<li><a href=" + '#' + ">" + this.to + "</a></li>" ).click(function(){
            self.$http.get(go_to , function(cards){
              this.cards = cards.data; 
                            this.to = this.to +1;
              // the next request
            $( ".pagination" ).append( "<li><a href=" + '#' + ">" + this.to  + "</a></li>" );
              // end next request
            });
      }); */


    },
  
  }
})