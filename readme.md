[LEMBRAR]

php artisan vendor:publish --provider "Prettus\Repository\Providers\RepositoryServiceProvider"

[OQ FOI FEITO HOJE 13/08]

- CRIADO AS ENTIDADES
- CRIADO ALGUNS SERVIÇOS
- DEFINIDO QUE O CODIGO PROMOCIONAL VAI SER CRC32
- CRIADO AS MIGRATIONS E FUNCIONANDO CORRETAMENTE
- ALTERADO NAS CONFIGURAÇÕES O TAMANHO DO VARCHAR

OQ FALTA HOJE

- Criação dos factories e seeds
- Criar as rotas para os serviços
- Criação das funções de inseração básica


[ALTERACOES NO CODIGO]

- Em ofertas foi adicionado expiraçao, para saber quando aquela promoçao vai acabar
- Em oferta foi adicionado o campo promo_code que  pode ser digitado ao criar a campanha,
caso não deve ser preenchido automaticamente, deve ser único, até 5 caracteres.
- Em oferta desconto está em inteiro, para evitar erros de arredondamento.
- Foi adicionado uma descrição para a campanha de ofertas.
 
- Em recipient foi alterado de name para First Name and Last Name
- Em recipient is_valid verifica se o e-mail existe no servidor

- Voucher foi adicionado data de uso, expiration e used_date são unix timestamp
- Voucher foi adicionado offer_name, para evitar joins desnecessários.
