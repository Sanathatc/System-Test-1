new Vue({
    el: '#vue',
        data: {
            selectMonth:[
                {
                    id:1,
                    name:'January',
                },{
                    id:2,
                    name:'February',
                },{
                    id:3,
                    name:'March',
                },{
                    id:4,
                    name:'April',
                },
            ],
            item: {},
            department:false,
            editObject: null,
            total:0,
            dept_name:null,
            alltransaction:[],
            dept:null
        },
        methods: {
            opendept()
            {
                this.department = true;
                //this.dept_name = dept;
            },
            fetchLastransactions()
            {
                $.ajax({
                    url:  'index.php?r=salarytransaction/fetchtransaction',
                    type: 'GET',
                    data: { id: 1},
                    dataType: 'json',
                }).done(response => {
                    this.alltransaction = JSON.parse(JSON.stringify(response))
                  //alertify.success('Saved!');
                })
            },
            generatesalary()
            {
               $.ajax({
                    url:  'index.php?r=salarytransaction/generatesalary',
                    type: 'POST',
                    data: { month: this.month,},
                    dataType: 'json',
                }).done(response => {
                   
                  alertify.logPosition("bottom right")
                  if(response==1){
                       alertify.success('Saved!');
                  }else{
                        alertify.error('Not Updated')
                  }
                  
                })
            },
        },
        created() {
        }
    })
