PGDMP         $                z            sistem_elektronik    14.2    14.2 J    L           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            M           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            N           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            O           1262    17142    sistem_elektronik    DATABASE     q   CREATE DATABASE sistem_elektronik WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_Indonesia.1252';
 !   DROP DATABASE sistem_elektronik;
                postgres    false            ?            1259    17641    category    TABLE     ?   CREATE TABLE public.category (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.category;
       public         heap    postgres    false            ?            1259    17640    category_id_seq    SEQUENCE     x   CREATE SEQUENCE public.category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.category_id_seq;
       public          postgres    false    227            P           0    0    category_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.category_id_seq OWNED BY public.category.id;
          public          postgres    false    226            ?            1259    17632    electronics    TABLE     ?  CREATE TABLE public.electronics (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    category_id bigint NOT NULL,
    description text NOT NULL,
    price integer NOT NULL,
    stock integer NOT NULL,
    image_name character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.electronics;
       public         heap    postgres    false            ?            1259    17631    electronics_id_seq    SEQUENCE     {   CREATE SEQUENCE public.electronics_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.electronics_id_seq;
       public          postgres    false    225            Q           0    0    electronics_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.electronics_id_seq OWNED BY public.electronics.id;
          public          postgres    false    224            ?            1259    17583    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            ?            1259    17582    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    215            R           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    214            ?            1259    17559 
   migrations    TABLE     ?   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            ?            1259    17558    migrations_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    210            S           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    209            ?            1259    17576    password_resets    TABLE     ?   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    postgres    false            ?            1259    17595    personal_access_tokens    TABLE     ?  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            ?            1259    17594    personal_access_tokens_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    217            T           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    216            ?            1259    17607    products    TABLE     ?  CREATE TABLE public.products (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    type character varying(255) NOT NULL,
    description text NOT NULL,
    price integer NOT NULL,
    quantity integer NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.products;
       public         heap    postgres    false            ?            1259    17606    products_id_seq    SEQUENCE     x   CREATE SEQUENCE public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.products_id_seq;
       public          postgres    false    219            U           0    0    products_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;
          public          postgres    false    218            ?            1259    17625    transaction_details    TABLE       CREATE TABLE public.transaction_details (
    id bigint NOT NULL,
    transaction_id integer NOT NULL,
    electronic_id integer NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 '   DROP TABLE public.transaction_details;
       public         heap    postgres    false            ?            1259    17624    transaction_details_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.transaction_details_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.transaction_details_id_seq;
       public          postgres    false    223            V           0    0    transaction_details_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.transaction_details_id_seq OWNED BY public.transaction_details.id;
          public          postgres    false    222            ?            1259    17616    transactions    TABLE     ?  CREATE TABLE public.transactions (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    transaction_total integer NOT NULL,
    transaction_status character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_id bigint,
    total_payment double precision,
    total_item integer
);
     DROP TABLE public.transactions;
       public         heap    postgres    false            ?            1259    17615    transactions_id_seq    SEQUENCE     |   CREATE SEQUENCE public.transactions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.transactions_id_seq;
       public          postgres    false    221            W           0    0    transactions_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.transactions_id_seq OWNED BY public.transactions.id;
          public          postgres    false    220            ?            1259    17566    users    TABLE     ?  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    "isAdmin" boolean NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false            ?            1259    17565    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    212            X           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    211            ?           2604    17644    category id    DEFAULT     j   ALTER TABLE ONLY public.category ALTER COLUMN id SET DEFAULT nextval('public.category_id_seq'::regclass);
 :   ALTER TABLE public.category ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    226    227    227            ?           2604    17635    electronics id    DEFAULT     p   ALTER TABLE ONLY public.electronics ALTER COLUMN id SET DEFAULT nextval('public.electronics_id_seq'::regclass);
 =   ALTER TABLE public.electronics ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    225    225            ?           2604    17586    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214    215            ?           2604    17562    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    209    210    210            ?           2604    17598    personal_access_tokens id    DEFAULT     ?   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    216    217            ?           2604    17610    products id    DEFAULT     j   ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);
 :   ALTER TABLE public.products ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    219    219            ?           2604    17628    transaction_details id    DEFAULT     ?   ALTER TABLE ONLY public.transaction_details ALTER COLUMN id SET DEFAULT nextval('public.transaction_details_id_seq'::regclass);
 E   ALTER TABLE public.transaction_details ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    223    223            ?           2604    17619    transactions id    DEFAULT     r   ALTER TABLE ONLY public.transactions ALTER COLUMN id SET DEFAULT nextval('public.transactions_id_seq'::regclass);
 >   ALTER TABLE public.transactions ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220    221            ?           2604    17569    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    212    211    212            I          0    17641    category 
   TABLE DATA           P   COPY public.category (id, name, deleted_at, created_at, updated_at) FROM stdin;
    public          postgres    false    227   ?Y       G          0    17632    electronics 
   TABLE DATA           ?   COPY public.electronics (id, name, slug, category_id, description, price, stock, image_name, deleted_at, created_at, updated_at) FROM stdin;
    public          postgres    false    225   Z       =          0    17583    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    215   O[       8          0    17559 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    210   l[       ;          0    17576    password_resets 
   TABLE DATA           C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public          postgres    false    213   F\       ?          0    17595    personal_access_tokens 
   TABLE DATA           ?   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, created_at, updated_at) FROM stdin;
    public          postgres    false    217   c\       A          0    17607    products 
   TABLE DATA           z   COPY public.products (id, name, slug, type, description, price, quantity, deleted_at, created_at, updated_at) FROM stdin;
    public          postgres    false    219   ?\       E          0    17625    transaction_details 
   TABLE DATA           t   COPY public.transaction_details (id, transaction_id, electronic_id, deleted_at, created_at, updated_at) FROM stdin;
    public          postgres    false    223   ?\       C          0    17616    transactions 
   TABLE DATA           ?   COPY public.transactions (id, uuid, transaction_total, transaction_status, deleted_at, created_at, updated_at, user_id, total_payment, total_item) FROM stdin;
    public          postgres    false    221   ?\       :          0    17566    users 
   TABLE DATA           ?   COPY public.users (id, name, email, "isAdmin", email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public          postgres    false    212   ?]       Y           0    0    category_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.category_id_seq', 5, true);
          public          postgres    false    226            Z           0    0    electronics_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.electronics_id_seq', 4, true);
          public          postgres    false    224            [           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    214            \           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 9, true);
          public          postgres    false    209            ]           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    216            ^           0    0    products_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.products_id_seq', 1, false);
          public          postgres    false    218            _           0    0    transaction_details_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.transaction_details_id_seq', 7, true);
          public          postgres    false    222            `           0    0    transactions_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.transactions_id_seq', 9, true);
          public          postgres    false    220            a           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 26, true);
          public          postgres    false    211            ?           2606    17646    category category_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.category
    ADD CONSTRAINT category_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.category DROP CONSTRAINT category_pkey;
       public            postgres    false    227            ?           2606    17639    electronics electronics_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.electronics
    ADD CONSTRAINT electronics_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.electronics DROP CONSTRAINT electronics_pkey;
       public            postgres    false    225            ?           2606    17591    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    215            ?           2606    17593 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    215            ?           2606    17564    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    210            ?           2606    17602 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    217            ?           2606    17605 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    217            ?           2606    17614    products products_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.products DROP CONSTRAINT products_pkey;
       public            postgres    false    219            ?           2606    17630 ,   transaction_details transaction_details_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.transaction_details
    ADD CONSTRAINT transaction_details_pkey PRIMARY KEY (id);
 V   ALTER TABLE ONLY public.transaction_details DROP CONSTRAINT transaction_details_pkey;
       public            postgres    false    223            ?           2606    17623    transactions transactions_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.transactions
    ADD CONSTRAINT transactions_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.transactions DROP CONSTRAINT transactions_pkey;
       public            postgres    false    221            ?           2606    17575    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    212            ?           2606    17573    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    212            ?           1259    17581    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public            postgres    false    213            ?           1259    17603 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     ?   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    217    217            I   l   x?3??H?K)???K????4202?50?50Q04?2??22?&?e???XP?_?U??61.SNǜ????Ҽ????L?Ģ?l Y??l???????????161?=... V?)?      G   '  x?m??n?0????? ??4?D?l??1i\ Me
#FU???/-C?D???/???????/'???D? ?j=?K?c?@#3?0???????t?0lW
k
cI?e??K:???9?.?̻2_??P??ț?ʶ??o??_ȍ[dK/??y?+g??,e??g?V9???M?cK?}d?d??Z??ֻ+?h?g[9?2h??ԦD?GU?a?lB[<]??^UO???s?!)?h?????0???-&?W??P??v?{I?p??Q??^6ϖ??5?߃?D{??>??Ӗ?a?!?KLL"!?/?vv
      =      x?????? ? ?      8   ?   x?m?I?0E??0(???.HV?T???Bܞ?i^x???o8q?!pd?B?H?ɓ?t;?	
?? >??/?:t?)dE$?AVc?????:??6?r??z9??]?I???Ɛ??}ИMM???WL??t???.T??e?\(U?lpz?ڄ??vW?|??_???^?xFjQ)?z4?	Ύ??xs?U????ͺw_?EQ| ?[?%      ;      x?????? ? ?      ?      x?????? ? ?      A      x?????? ? ?      E   A   x?3???4????4202?50?5?P0??2??21?&?e?i?i????H?????????W? ?L?      C   ?   x?u?;?0??)r?E?/^?ZzN?Ǝm???A?(Ô#?{?0j?`ƽ??~??mZ?]??F?Ha"t}=?????A ?ȒM?x??H?X?\??{?:w????kF??Ѧy?H???O??Zd-??] ?? ?vq?} ?13      :   o  x?}?ɲ?H??<E-j?H&???P?A&4z??̃??ӷ??]????????yȄx]~???:?v^Y???ګj򔧃?????;???;?_?[?????eC???mÞs?#	?+???Z????$w<??????w?8H?K4?0)???ɍ??????F???E???????0ZW??2???<??
?y=? ????7??hn?\F???n??E??1?7O?Hެ?z????]X؞\??x???|??q?M?? ?m??SC?,.#??;V?ئk?C????4???햅˥?,???P?{?^/VK?#??????p|d??????3~N?C"cP??L7?m????T@'???IpX2?喳??Q?&?!|G0?q?2???Q翾?1?[?`./??s-d=?ɢt?:^?oh??Zw??˒O?u?b0????GF ??|ٰ*?5?y?????}??+- ?^?7UV???0SW*?[e???9փ .# ???)???[ /??f^&a?x???(??,]??/?8ը???Xr?o??c(?{?|d@????O??p???1셨?h?|???Mu/??ʃ?*?kT?s)P\????t#?H?E??F??e??"a?-??^?g?0%??j???HM'?ɠ?/?C??\??v???V?7???\F<??c???0/~??9],???:j??q?6?l????w?V???????e{?eo洸o??,͍?????9?c8fZ??a)TĪ????eO6N?'??bYMǊT-??ω>O?ڞ]c<?5?m??x???{????V?M??ls?????ֱ??a9??ӝ???7\??Ê????0.#???x????JNE?yCX???????xc?L7t6uf ???b1s??y?D? ??H?z?˦?c?O.?7??t,??y??T??@e?,??Y??s<?ӻ<^c??Q??????BA)m???S/?qW)	?-o??yl???????T???k+yW??c??P;??,}d????I?4/?(??H????$?ް???xVQ?o?????1?U???u??,?@\F<V?
??:??e%?^?????\;X??????{n%?D\n??7?B ??D?0??F?????^)_?-?m???%'_ӭ3ܴC2P?S&JٹA??tPəK?%F?&?S??^yfģ?_(????St?O+?aD? ??EW<*??a6\f???ɱi??????M??,??=3???f?[???K?,m????????T??Z?????&?6?XW??@ɹB??~$?c?|4̍M?ɴ˕?w?????!ed?{?fyeU?E?x?J?[??~?B?\?&???????beA
????j?? ?Z?q??6??8??x? ???~ˈ?I? ?ްTu     