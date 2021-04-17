import React, { Component } from 'react'
import { getData } from '../services/index.js'
import { validateEmail, validateText, validatePass, validatePhone } from '../helpers/helpers'

export class Register extends Component {
    state = {
        name: '',
        mail: '',
        phone: '',
        password: '',
        role: '',
        message: '',
        messageName: '',
        messageMail: '',
        messagePhone: '',
        messagePass: '',
        messageRole: ''
    }
    
    checkData(data){
        let men = []

        let mail = (!validateEmail(data.mail) ? 'Mail not valid' : '')
        let name = (!validateText(data.name) ? 'Name not valid' : '')
        let phone= (!validatePhone(data.phone) ? 'Phone not valid' : '')
        let pass = (!validatePass(data.password) ? 'Password not valid' : '')
        let role = (data.role === '' ? 'Role not valid' : '')

        if (name === '' &&  mail === '' &&  pass === '' && phone === '' &&  role === '') {
            men = []
        } else {
            men['name'] = name 
            men['mail'] = mail 
            men['phone'] = phone 
            men['pass'] = pass 
            men['role'] = role 
        }

        return men
    }

    resetMessages(){
        this.setState({messageName: ''})
        this.setState({messageMail: ''})
        this.setState({messagePhone: ''})
        this.setState({messagePass: ''})
        this.setState({messageRole: ''})
    }

    ifDataBad(men){
        if (men['name'] !== '') {
            let messageName = <article className="message is-danger">
                <div className="message-body">
                    {men['name']}
                </div>
            </article>
            this.setState({messageName: messageName})
        }
        if (men['mail'] !== '') {
            let messageMail = <article className="message is-danger">
                <div className="message-body">
                    {men['mail']}
                </div>
            </article>
            this.setState({messageMail: messageMail})
        }
        if (men['phone'] !== '') {
            let messagePhone = <article className="message is-danger">
                <div className="message-body">
                    {men['phone']}
                </div>
            </article>
            this.setState({messagePhone: messagePhone})
        }
        if (men['pass'] !== '') {
            let messagePass = <article className="message is-danger">
                <div className="message-body">
                    {men['pass']}
                </div>
            </article>
            this.setState({messagePass: messagePass})
        }
        if (men['role'] !== '') {
            let messageRole = <article className="message is-danger">
                <div className="message-body">
                    {men['role']}
                </div>
            </article>
            this.setState({messageRole: messageRole})
        }
    }

    _nameChange = (e) => {
        this.setState({name: e.target.value})
    }
    
    _mailChange = (e) => {
        this.setState({mail: e.target.value})
    }
    
    _phoneChange = (e) => {
        this.setState({phone: e.target.value})
    }

    _passChange = (e) => {
        this.setState({password: e.target.value})
    }

    _roleChange = (e) => {
        this.setState({role: e.target.value})
    }
    
    _handleSubmit = async (e) => {
        let message = ''
        e.preventDefault()
        let men = this.checkData(this.state)
        if (men.length == 0) {
            let res
            this.resetMessages()
            const formData = new FormData()
            formData.append('request', 'register')
            formData.append('name', this.state.name)
            formData.append('mail', this.state.mail)
            formData.append('password', this.state.password)
            formData.append('phone', this.state.phone)
            formData.append('role', this.state.role)

            res = await getData(formData)
            
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
                this.setState({message: message})
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
                this.setState({message: message})
            }
        } else {
            // Data bad
            this.ifDataBad(men)
        }

    }

    render() {
        return (
            <form className="container is-max-desktop box block" onSubmit={this._handleSubmit}>
                <h1 className="title"> Register </h1>
                <div className="columns is-mobile">
                    <div className="column is-three-fifths is-offset-one-fifth">
                        <div className="field">
                            <p className="control has-icons-left has-icons-right">
                                <input className="input block" type="name" placeholder="Name" onChange={this._nameChange}/>
                                <span className="icon is-small is-left">
                                    <i className="fas fa-envelope"></i>
                                </span>
                                <span className="icon is-small is-right">
                                    <i className="fas fa-check"></i>
                                </span>
                            </p>
                            {this.state.messageName}
                        </div>
                        <div className="field">
                            <p className="control has-icons-left">
                                <input className="input block" type="password" placeholder="Password" onChange={this._passChange}/>
                                <span className="icon is-small is-left">
                                    <i className="fas fa-lock"></i>
                                </span>
                            </p>
                            {this.state.messagePass}
                        </div>
                        <div className="field">
                            <p className="control has-icons-left">
                                <input className="input block" type="email" placeholder="Email" onChange={this._mailChange}/>
                                <span className="icon is-small is-left">
                                    <i className="fas fa-lock"></i>
                                </span>
                            </p>
                            {this.state.messageMail}
                        </div>
                        <div className="field">
                            <p className="control has-icons-left">
                                <input className="input block" type="numer" placeholder="Phone" onChange={this._phoneChange}/>
                                <span className="icon is-small is-left">
                                    <i className="fas fa-lock"></i>
                                </span>
                            </p>
                            {this.state.messagePhone}
                        </div>
                        <div className="field">
                            <div className="select is-rounded has-icons-left">
                                <select onChange={this._roleChange}>
                                    <option> Select role </option>
                                    <option value="1"> Administrator </option>
                                    <option value="0"> User </option>
                                </select>
                            </div>
                            {this.state.messageRole}
                        </div>
                        <div className="field">
                            <p className="control">
                                <button onSubmit={this._handleSubmit} className="button is-success">Register</button>
                            </p>
                        </div><br/>
                        {this.state.message}
                    </div>
                </div>
            </form>
        );
    }
}


