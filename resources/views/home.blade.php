@extends('template.layout')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="columns personal-menu text-center vertical-center margin0">
            <div class="column">
                Zona de pruebas
            </div>
        </div>
        <div class="columns margin0 tile">
            <div class="column is-2 line-der">
                <aside class="menu">
                    <p class="menu-label">
                        Menu Principal
                    </p>
                    <ul class="menu-list">
                        <li @click="menu=0" class="hand-option"><a
                                    :class="{'is-active' : menu==0 }">Dashboard</a></li>
                        <li @click="menu=1" class="hand-option"><a :class="{'is-active' : menu==1 }">Departamentos</a>
                        </li>
                        <li @click="menu=2" class="hand-option"><a
                                    :class="{'is-active' : menu==2 }">Cargos</a></li>
                        <li @click="menu=3" class="hand-option"><a
                                    :class="{'is-active' : menu==3 }">Empleados</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column personal-content" v-if="menu==0">
                <div class="columns text-center">
                    <div class="column">
                        <h3>Dashboard</h3>
                    </div>
                </div>
                <div class="columns text-center">
                    <div class="column">
                        <h1>Bienvenido</h1>
                    </div>
                </div>
            </div>
            <div class="column" v-if="menu==1">
                <div class="columns">
                    <div class="column text-center">
                        <h3>Departamentos</h3>
                    </div>
                    <div class="column">
                        <a class="button is-success" @click="openModal('department','create')">Agregar Departamento</a>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        Tabla de  departamentos
                    </div>
                </div>
            </div>
            <div class="column" v-if="menu==2">
                <div class="columns">
                    <div class="column text-center">
                        <h3>Cargos</h3>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        Tabla Cargos
                    </div>
                </div>
            </div>
            <div class="column" v-if="menu==3">
                <div class="columns">
                    <div class="column text-center">
                        <h3>Empleado</h3>
                    </div>
                    <div class="column">
                        Tabla Empleados
                    </div>
                </div>
            </div>
        </div>
        <div class="columns margin0 text-center vertical-center personal-menu">
            <div class="column">Empleados 0</div>
            <div class="column">Departamentos 0</div>
            <div class="column">Cargo 0</div>
        </div>
    </div>

    {{--Modal--}}
    <div class="modal" :class="{'is-active' : modalGeneral}">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="content">
                <h3 class="text-center">@{{titleModal}}</h3>
                <div class="field">
                    <label class="label">@{{messageModal}}</label>
                    <p class="control" v-if="modalDepartment!=0">
                        <input class="input" placeholder="Departamento" v-model="titleDepartment"
                               v-if="modalDepartment==1">
                    </p>
                    <div v-show="errorTitleDepartment" class="columns text-center">
                        <div class="column text-center text-danger">
                            El nombre del Departamento no puede estar vacio
                        </div>
                    </div>
                    <div class="columns button-content">
                        <div class="column">
                            <a class="button is-success" @click="createDepartment()" v-if="modalDepartment==1">Aceptar</a>
                        </div>
                        <div class="column">
                            <a class="button is-danger" @click="closeModal()">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="modal-close" @click="closeModal()"></button>
        </div>
    </div>
@endsection

@section('script')
    <script>
let elemento = new Vue({
    el: '.app',
    data: {
        menu: 0,
        modalGeneral: 0,
        titleModal: '',
        messageModal: '',
        modalDepartment: 0,
        titleDepartment: '',
        errorTitleDepartment: 0
    },
    methods: {
        closeModal() {
            this.modalGeneral = 0;
            this.titleModal = '';
            this.messageModal = '';
        },

        createDepartment() {
            if (this.titleDeparment == '') {
                this.errorTitleDeparment = 1;
            }
            let me = this;
            axios.post('{{ route('department.store') }}', {
                'title': this.titleDepartment
            })
                .then(function (response) {
                    me.titleDepartment = '';
                    me.errorTitleDepartment = 0;
                    me.modalDepartment = 0;
                    me.closeModal();
                    console.log('guardado en la DB');
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        openModal(type, action, data = []) {
            switch (type) {
                case "department":
                {
                    switch (action) {
                        case 'create':
                        {
                            this.modalGeneral = 1;
                            this.titleModal = 'Creación de Departamento';
                            this.messageModal = 'Ingrese el titulo del departamento';
                            this.modalDepartment = 1;
                            this.titleDepartment = '';
                            this.errorTitleDepartment = 0;
                            break;
                        }
                        case 'update':
                        {
                        break;
                        }
                        case 'delete':
                        {
                        break;
                        }

                    }
                    break;
                }
                case "position":
                {
                    switch (action) {
                        case 'create':
                        {

                            break;
                        }
                        case 'update':
                        {
                            break;
                        }
                        case 'delete':
                        {
                            break;
                        }

                    }
                    break;
                }
                case "employee":
                {
                    switch (action) {
                        case 'create':
                        {

                            break;
                        }
                        case 'update':
                        {
                            break;
                        }
                        case 'delete':
                        {
                            break;
                        }

                    }
                    break;
                }
            }

        },
    },
})
    </script>
@endsection