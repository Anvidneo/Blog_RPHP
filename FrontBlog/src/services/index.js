import axios from 'axios'

const URL = 'https://192.168.0.22/BlogRPHP/BackBlog/index.php'

export async function getData(params) {
    try {
        let response = await axios({
            url: URL,
            method: 'POST',
            headers : {
                'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            data: params
        })
        return response.data
    } catch (e) {
        console.error(e)
    }
}