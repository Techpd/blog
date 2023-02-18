<?php

// $insta_Json_url = 'https://www.instagram.com/pawandixitg/?__a=1&__d=dis';

// $url = $insta_Json_url;
// $Insta_data = json_decode(file_get_contents($url), true);
// // print_r($obj);
// foreach($Insta_data as $data){
//     $followers = $data;
//     echo $followers['graphql'];
// }
?>
<script>
    // function insta_parser() {
    //     // var baseURL = "https://www.instagram.com/";
    //     // var insta_username = 'pawandixitg';
    //     // // creating url as per below URL RULE
    //     // var hit_URL_API = `${baseURL}${insta_username}/?__a=1&__d=dis`;
    //     // console.log(hit_URL_API);
    //     // let url = hit_URL_API;
    //     fetch('https://www.instagram.com/pawandixitg/?__a=1&__d=dis')
    //         .then((res) => res.json())
    //         .then((out) => jsonResp(out))
    //         .catch((err) => {
    //             throw err;
    //         });
    //     // accessing data from the above fetch method or converting to time to string
    //     function jsonResp(fetched_API) {
    //         // create video object data -> title,likes, duration , views
    //         // var title = fetched_API["items"][0].snippet.title;
    //         // var likes = fetched_API["items"][0].statistics.likeCount;
    //         // var views = fetched_API["items"][0].statistics.viewCount;
    //         // var views = fetched_API["items"][0].statistics.viewCount;
    //         console.log(fetched_API);
    //         fetched_API.forEach(function(data) {
    //             console.log(data);
    //         });
    //     }
    // }

    var access_token = 'IGQVJYWEg5SEV4ZAEZAqcHUwaE92dTFxRTNvLTNJTUl3ZAlJjMGVZAWkRURmtHZAVJ1VDJ4MjhmU0RROUhjVTVqNTZAsZAG5BRlhkVTVDWTdKRG5pRXJiWEw3VHZAtZAk1Tdk9uT20wdmQzUjNySzJ4RElVMExYNAZDZD';
    // fetch(`https://graph.instagram.com/17841402152073430?fields=id,username,followers&access_token=${access_token}`)
    //     .then(response => response.json())
    //     .then(data => console.log(data))
    //     .catch(error => console.error(error));

    fetch(`https://graph.instagram.com/17841402152073430?fields=id,username,followers&access_token=${access_token}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP Error: ${response.status}`);
            }
            return response.json();
        })
        .then(data => console.log(data.followers))
        .catch(error => console.error(error));


    // const username = 'pawandixitg'; 
    // fetch(`https://www.instagram.com/${username}/?__a=1`)
    //     .then(response => response.json())
    //     .then(data => console.log(data.graphql.user.id))
    //     .catch(error => console.error(error));

    // fetch(`https://api.instagram.com/v1/users/search?q=pawandixitg&access_token=${access_token}`)
    //     .then(response => response.json())
    //     .then(data => {
    //         const user = data.data.find(user => user.username === '{username}');
    //         console.log(user.id);
    //     })
    //     .catch(error => console.error(error));
</script>