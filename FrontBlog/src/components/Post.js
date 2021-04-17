import { Component } from 'react'
import { getData } from '../services/index.js'
import { validateText } from '../helpers/helpers'

export class Post extends Component {
    state = {
        id: '1',
        id_category: '1',
        id_autor: '1',
        id_post: '1',
        post: '',
        comment: '',
        messageComment: ''
    }

    _commentChange = (e) => {
        this.setState({comment: e.target.value})
    }

    _handleSubmit = async (e) => {
        e.preventDefault()
        let message = ''
        let res

        const formData = new FormData()
        formData.append('request', 'new_comment')
        formData.append('id_autor', this.state.id_autor)
        formData.append('id_post', this.state.id_post) 
        formData.append('text', this.state.comment) 
        
        res = await getData(formData)
        console.log(res)
        if (res.state === 1) {
            message = <article className="message is-primary">
                <div className="message-header">
                <p>Success!</p>
                <button className="delete" aria-label="delete"></button>
                </div>
                <div className="message-body">
                    {res.message}
                </div>
            </article>
            this.setState({messageComment: message})
        } else {
            message = <article className="message is-danger">
                <div className="message-header">
                <p>Error!</p>
                <button className="delete" aria-label="delete"></button>
                </div>
                <div className="message-body">
                    {res.message}
                </div>
            </article>
            this.setState({messageComment: message})
        }
        
    }
    
    async getPost(){
        let post = ''
        const formData = new FormData()
        formData.append('request', 'posts')
        formData.append('id', '1')
        formData.append('id_category', '1')
        
        let res = await getData(formData)
        if (res.state === 1) {
            if (res.state.lenght == 0) {
                post = <article className="media">
                    <div className="media-content">
                        <div className="content">
                            <p>
                                <strong>Barbara Middleton</strong>
                                <br/>{res.data.text}.<br/>
                                <small><a>Like</a></small>
                            </p>
                            </div>

                            <article className="media">
                            <figure className="media-left">
                                <p className="image is-48x48"></p>
                            </figure>
                            <div className="media-content">
                                <div className="content">
                                    <p>
                                        <strong>Sean Brown</strong>
                                        <br/>
                                        Donec sollicitudin urna eget eros malesuada sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam blandit nisl a nulla sagittis, a lobortis leo feugiat.
                                        <br/>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                </article>
            }
        }  
        return post
    }

    
    render() {
        return (
            <div className="container is-widescreen">
                <nav className="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="#">BlogRPHP</a></li>
                        <li><a href="#">Posts</a></li>
                        <li className="is-active"><a href="#" aria-current="page">1</a></li>
                    </ul>
                </nav>
                <div className="card">
                    <div className="card-content">
                        <div className="content">
                            {/* {this.getPost()} */}
                            <article className="media">
                                <div className="media-content">
                                    <div className="field">
                                        <p className="control">
                                            <textarea className="textarea" placeholder="Add a comment..." onChange={this._passChange}></textarea>
                                        </p>
                                    </div>
                                    <div className="field">
                                        <p className="control">
                                            <button onClick={this._handleSubmit} className="button">Post comment</button>
                                        </p>
                                    </div>
                                    {this.state.messageComment}
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

