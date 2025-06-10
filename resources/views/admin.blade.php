@extends('layout.main-layout')
@section('content')

    <section class="conteudo">

        <h2>Cadastrar usuário</h2>

        <form method="post" action="{{ 'cadastraProduto' }}">
            <label for="descricao_produto">Descrição da ferramenta<small> *</small>
                <div>
                    <input type="text" name="descricao_produto" id="descricao_produto" placeholder="Descriçao do produto">
                </div>
                @error('email')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <label for="marca_produto">Marca<small> *</small>
                <div>
                    <input type="text" name="marca_produto" id="marca_produto" placeholder="Marca do produto">
                </div>
                @error('email')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>
            
            <label for="modelo_produto">Produto<small> *</small>
                <div>
                    <input type="text" name="modelo_produto" id="modelo_produto" placeholder="Modelo do produto">
                </div>
                @error('email')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <label for="categoria_produto">Categoria<small> *</small>
                <div>
                    <select name="categoria_produto" id="categoria_produto">
                        <option value="">Categoria do produto</option>
                            <option value=""></option>
                    </select>
                </div>
                @error('email')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>
            
            <label for="preco_produto">Preço<small> *</small>
                <div>
                    <input type="text" name="preco_produto" id="preco_produto" placeholder="Preço do produto">
                </div>
                @error('email')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <div class="buttons-container">
                <button type="submit">Cadastrar</button>
                <button type="button" id="btn-cancelar">Cancelar</button>
            </div>

        </form>
    </section>

    <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

    <section class="conteudo">

        <h2>Usuários cadastrados</h2>

        <table>
            <thead>
                <tr>
                    <td>Descriçao</td>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Categoria</td>
                    <td>Preço</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </section>
    
@endsection