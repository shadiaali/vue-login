export default {
    template: `
        <div id="login">
            <h1>Log In</h1>
            <input type="text" name="username" v-model="input.username" placeholder="username"/>
            <input type="password" name="password" v-model="input.password" placeholder="password"/>
            <button v-on:click="login()">Login</button>
            </div>
    `,

    data() {
        return {
            input: {
                username: "",
                password: ""
             }
        }
    },

    methods: {
        login() {
            if (this.input.username != "" && this.input.password != "") {
                //fetch data from server and match passwords
              let url = `./includes/index.php?username=${this.input.username}&&password=${this.input}`
fetch(url)
.then(res => res.json())
.then(data => {
  if (data[0] == "false"){
    console.log('login failed');
  } else{
    this.$emit("authenticated", true);
    this.$router.replace({ name: "users"} );
  }

})
.catch(function(error) {
  console.log(error);
});

} else {
  console.log('cant be blanky ok');
}
}
}
}
