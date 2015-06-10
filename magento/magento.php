<?php
﻿------------2014-09-02-------------------------

网站(Website)是一些共享相同的客户、订单信息和购物车信息的商店（Store）的集合。

网店(Store)是一些 StoreView 的集合

storeView网店视图

界面（Interface）是一些主题（Themes）的集合，主题是确定网店的外观和前台页面结构的。一个界面可以在 Magento
后台为网站级别(和/或) Store View 指定级别
网站级别的声明
1.  网站级别的声明（Website-level declaration)
2.  Store View  级别的声明（Store view-level declaration ）
主题（Themes）是由布局 （Layout），模板（Template）和皮肤文件（skin 文件是控制网店的显示效果的）组成。
默认主题（Default theme ）
非默认主题（Non-default theme ）
主题的组件：
layout(布局)----xml文件-它的作用是定义不同页面的区块(Block)结构--默认布局(Default Layout)和布局更新(Layout Updates)--'catalog.xml'是一个分类模块的布局文件, 'customer.xml'是客户模块的布局文件...等
template(模版)---PHTML文件
Locale(本地)--这些都是在每个语言基础上组织的简单的文本文件,包含商店的翻译副本
skin(皮肤)---具体区块(Blocks)中的 JavaScript、CSS 和图片文件

Blocks(区块)
结构区块(Structural Block)---创建网店页面的可视结构
内容区块(Content Block)---它们是具体的每个功能的表现块--分类列表(Category List),小购物车(Mini Cart),产品标签(ProductTags)和产品列表(Product Listing)等等--页面内的每一个功能特性



默认主题
非默认主题 template/catalog/home.phtml
记住,不管在此 Design 中如何配置,Magento都将自动装载名字叫'default'的主题

Say Hello to Multiple Themes----加载多个主题
主题的层次(Hierarchy of Themes)

缓存控制 进入admin后台 System -> CacheManagement

骨架模板(Skeleton template)----(X)HTML
template/page/

看到所有模板块的路径
1. 进入后台,到 System -> Configuration
2. 在右上角的 Website/Store 选择器中选择你的商店
3. 然后选择左侧栏的 Developer 标签,并在 Template Path Hints 中选择 Yes
app/etc/modules/Mage_All.xml

布局原理解析(Anatomy of Layout)
行为特性的布局 XML标记
句柄(Handle)
<default>---它将按照指定的句柄中的页面嵌套更新对页面进行处理
<block>---决定页面中的每个区块的行为和视觉表现
type – 这是模块类的标识符,它定义了区块的功能。此属性不应该被修改。
name – 这是名称,其他的区块可以通过此名称引用此区块
before (and) after – 这两种方法决定内容区块在结构区块中的位置。before="-" 和 after="-"这样的命令标志此区块的位置是一个结构区块的最上方或最下方。
template - 这个属性指定的值决定了此区块的功能是使用哪个模板
action – <action> 是用来控制前台的功能的,如加载或不加载一个 JavaScript
as – 此属性指定模板文件中会调用那个区块
<reference>---用来引用另一个区块
<widgets>

xml 必须有一个结束标记(<xml_tag></xml_tag>)或自我结束(<xml_tag/>)



xml标签
_   html_pager _resource_singleton
控制器
显示模板的方法
三大模型
数据库的调用方法
五大类
各种类的实例调用


get_magic_quotes_gpc()--这个函数的作用就是得到php.ini设置中magic_quotes_gpc选项的值
func_get_args()是获取方法中参数的数组，返回的是一个数组，与func_num_args搭配使用；
public static function app($code = '', $type = 'store', $options = array())
{
    if (null === self::$_app) {
        self::$_app = new Mage_Core_Model_App();
        self::setRoot();
        self::$_events = new Varien_Event_Collection();
        self::$_config = new Mage_Core_Model_Config($options);

        Varien_Profiler::start('self::app::init');
        self::$_app->init($code, $type, $options);
        Varien_Profiler::stop('self::app::init');
        self::$_app->loadAreaPart(Mage_Core_Model_App_Area::AREA_GLOBAL, Mage_Core_Model_App_Area::PART_EVENTS);
    }
    return self::$_app;
}

1、const用于类成员变量定义，一旦定义且不能改变其值。define定义全局常量，在任何地方都可以访问。
2、define不能在类中定义而const可以。

--------2014-09-03-------------------------------------
Varient_Object 类是 Magento 中所有的Models的父类	lib/Varien/Object.php
Magento中大部分的data Collections都是继承自Varien_Data_Collection
Varien_Data_Collection对象--对一个product Collection 进行sort:
getData()
getFirstItem()
getLastItem()
toXml()
getColumnValues('name')--取其中的一个Column的值
getItemsByColumnValue('name','Spot')--过滤
--------2014-09-04-------------------------------------
Layout文件一般包含block、reference、action三种标签。
1.顶层的block一般位于page.xml中 Output表示通过toHtml进行输出。默认使用3columns.phtml三列布局。Type对应Mage_Page_Block_Html类。
2.在顶层的block中，一般包含以下几个关键部分，分别是Html头部、网页头部、内容左部中部右部、网页底部这么几个基本结构布局。
3.每个模块一般情况下都会有对应的模块xml文件，如目录布局文件为catalog.xml文件，支付为checkout.xml。不过对于magento系统来说，最终还是合并读取的
4.content内容一般在具体页面中进行指定，不同模块的内容肯定是不同的，在page.xml文件中只是定义了一个as。
5.footer包括了切换store、常见链接等。


<block type='' name='' action='' as=''  before (and) after template='-' ></block>
<store url=''/>
<skin url=''/>


Magento中部分数据表是设计成EAV形式的
EAV
eav_entity_type，eav_entity_attribute，eav_attribute

创建一个Hello World模块
为这个模块配置路由
为这个模块创建执行控制器
创建Hello World模块

建立目录
app/code/local/Alanstormdotcom/Helloworld/Block
app/code/local/Alanstormdotcom/Helloworld/controllers ---目录“controllers”（小写c）
app/code/local/Alanstormdotcom/Helloworld/etc
app/code/local/Alanstormdotcom/Helloworld/Helper
app/code/local/Alanstormdotcom/Helloworld/Model
app/code/local/Alanstormdotcom/Helloworld/sql
然后我们要创建一个系统配置文件来激活这个模块 ---检测是否添加
配置文件
<frontend />
		<routers />----http://example.com/frontName/actionControllerName/actionMethod/
		<modules >Packagename_Modulename(模块名)</modules>
		<frontName />
     <helloworld />
     配置路由 	--路由是用来把一个URL请求转换成一个执行控制器和方法
     为路由创建执行控制器
     app/code/local/Alanstormdotcom/Helloworld/controllers/IndexController.php

     -------2014-09-07-------------------------------
     我们可以不需要更改 Magento 的代码就能更改 Magento 的核心功能

     创建一个模块
     激活这个模块
     配置路由--路由是用来把一个 URL 请求转换成一个执行控制器和方法。---Magento 会在这个目录寻找模块的控制器文件controllers
     和传统的 PHP MVC 不同的是,你需要在 Magento 的全局配置中显式的定义你的路由
     <frontend/>
     “frontend”就是指网站的前台,“admin”是指网站的后台,“install”是 指 Magento 的安装程序
     <routers />--第一处包含的是路由对象的定义,第二处包含 的是路径的定义
     <module>内容</module>---内容是一个模块的全名
     -------2014-09-08----------------------------------
     Magento 把视图分离成块和模板的真正强大之处在于“getChildHtml”方法。这个方法可以让你实现在块中嵌套块的功能。顶层的块调用第二层的块,然后是第三层......这就是 Magento 如何输出 HTML 的


     layout --布局对象
     首先你得安装一个 LayoutViewer 模块
     块的类名在 Magento 中被称为“分组类名
     <reference />在布局文件中是用来表示替换一个已经存在的块
     Layout View 模块可以显示这些处理器showLayout=handles
     操作(Handle)和包布局(Package Layout)
     <update />
     <update handle="helloworld_index_index" />

     在 Magento 默认的配置下,HTML 输出是从名为“root”的块开始(其实是因为
        这个块 拥有 output 属性【译者注:任何一个拥有 output 属性的块都是顶层块,
        在拥有多个顶层块的情况下 Magento 将按照块定义的先后顺序输出 HTML】)


     定义了默认的模板
     template_links
     text_list

     Magento 模型分为两类。第一类是基本的 ActiveRecord 类型,一张表
     一个对象的模型。第二类是 Entity Attribute Value(EAV)模型


     Magento 的模型并不直接访问数据库。每一个模型都有一个资源模型(Resource
        Model),每一个资源模型拥有两个适配器(Adapter)
     要设置一个模型一共有以下四个步骤

     1.启用模型 config.xml
     <global>
     <models>
     <helloworld>
     <class>Zhlmmc_Helloworld_Model</class>
     <resourceModel>helloworld_mysql4</resourceModel>
     </helloworld>
     </models>
     </global>
     2.启用资源模型
     3.在资源模型中添加实体(Entity)。对于简单的模型来说,实体就是数据表的名字
     4.为资源模型设置读、写适配器

     所有的模型都必须继承 “Mage_Core_Model_Abstract”类
     所有的模型最终都继承自类“Varien_Object”
     方法名中的属性名字符合“camelcase”命名规则【注:简单的说就是 Java 的命名规则,
     每个单词的第一个字母大写,第一个字母可以大写也可以小写】
     数据库模型的curd---Magento 模型通过“load, save, delete”三个方法来支持基本的 Create,Read,Update 和 Delete
     操作

     开启调试模式
     1、 在根目录的.htaccess 文件最后加入SetEnv MAGE_IS_DEVELOPER_MODE TRUE
     2、将index.php中
     if (isset($_SERVER['MAGE_IS_DEVELOPER_MODE'])) {
      Mage::setIsDeveloperMode(true);
  }
  代码改为Mage::setIsDeveloperMode(true);

  资源配置---资源配置类Mage_Core_Model_Resource_Setup

  1、在配置文件中添加资源配置
  2、创建资源类文件
  3、创建安装脚本
  4、创建升级脚本
  5、添加资源配置
  select code,version from core_resource;core_resource这张表包含了系统中所有安装的模块和模块的版本

  Magento 升级的步骤

  1、从数据表“core_resource”中获得当前模块的安装版本
  2、从配置文件中获得当前模块的版本
  3、如果两个版本一样,那么什么都不做
4、如果#2 的版本号小于#1 的版本号,我也不知道 Magento 会干什么,理论上是不可能出现的情况
5、如果#2 的版本号大于#1 的版本号,那么开始升级程序
6、在配置脚本文件夹内(在上面的例子中是“helloworld_setup”)把所有升级脚本加入队列
7、在队列内,按照升级脚本的起始版本排序,升序
8、循环队列
9、如果队列中当前脚本的起始版本不等于“core_resource”数据表中当前模块的版本号,那么跳过该脚本
10、如果队列中当前脚本的起始版本等于“core_resource”数据表中当前模块的版本号并且目标版本小于等于#2 的版本号,那么执行该脚本。
11、循环队列结束,升级结束

-------------2014-09-09---------------------------

after'-'  before'-'
page//
<block type="core/text_list" name="after_body_start" as="after_body_start" translate="label">
<action method="setIsHandle"><applied>1</applied></action>
此处的功能主要是输出什么列表 ？
$configValue = Mage::getStoreConfig('sectionName/groupName/fieldName');
sectionName, groupName and fieldName are present in etc/system.xml file of your module.

--------------2014-09-10---------------------------
$block = Mage::getModel('cms/block')----静态方法

<?php echo $this->getLayout()->createBlock(‘cms/block’)->setBlockId('order_form')->toHtml() ?>

block_id="order_form"----block_id

cms /staic blocks

<layout>
	<updates>
		<hotel>
          <file>hotel.xml</file>
      </hotel>
  </updates>
</layout>

getChildHtml()---全部输出
output()方法生成HTML---getlayout()/renderLayout()

搜索框
<reference name="header">
    <block type="core/template" name="top.search" as="topSearch" template="catalogsearch/form.mini.phtml"/>
</reference>
$left_block = $this->loadLayout()->getLayout()->getBlock('left');
$this->loadLayout()->getLayout()->getBlock('content')->getSortedChildren();

打包 extension   进入后台Magenento Connect->Package Extensions
当插件升级错误或安装失败时，会出现Service Temporarily Unavailable错误，使网站前台后台都无法显示。
在操作完成的情况下，仍然出现这个错误时可以采用以下方法：
1.删除网站站点根目录下的maintenance.flag，如果没有刷新一下应该会出现；
2.删除网站var/cache文件夹中的内容，如果删除了cache文件夹可能会出现cache_dir不可写的错误，还要手动创建该文件夹，并chmod 777
3.这时网站已经可以正常显示了，如果插件安装错误，最好删除插件重新安装。

----------------2014-09-11----------------------------------
XML Structure---xml结构
modules:
<modules>
   <(NameSpace_ModuleName)>
   <active>[true|false]</active>
   <codePool>[core|community|local]</codePool>
   <depends>
       <(AnotherNameSpace_ModuleName) />
   </depends>
   <version>(version_number)</version>
   </(NameSpace_ModuleName>
</modules>

active	该模块是否生效(该element的值可在后台修改)
codePool	app/code 的具体路径,指定的应用程序/代码子目录
depends	是否依赖于其他的模块，如果被依赖的模块不存在，它就不active,指定其他的模块该模块的依赖关系
version	定义版本，用于更新和安装,模块升级
通常 active, codePool and depends 一般在 app/etc/modules/(NameSpace)_*.xml 文件中定义,
而 version 在相应module下的config.xml 文件中定义.
-------------------------------------------------
global:
<global>
    <models>
        <(modulename)>
        <class>(ClassName_Prefix)</class>
        <resourceModel>(modulename)_(resource_model_type)</resourceModel>
        <(modulename)_(resource_model_type)>
        <!-- definition -->
        </(modulename)_(resource_model_type)>
        <rewrite><!-- definition --></rewrite>
        </(modulename)>
    </models>
    <resources>
        <(modulename)_setup><!-- definition --></(modulename)_setup>
        <(modulename)_read><!-- definition --></(modulename)_read>
        <(modulename)_write><!-- definition --></(modulename)_write>
    </resources>
    <blocks>
        <(modulename)>
        <class>(ClassName_Prefix)</class>
        </(modulename)>
    </blocks>
    <helpers>
        <(modulename)>
        <class>(ClassName_Prefix)</class>
        </(modulename)>
    </helpers>
    <fieldsets>
        <(page_handle?)>
        <(field_name)>?</(field_name)>
        </(page_handle?)>
    </fieldsets>
    <template>
        <email>
            <(email_template_name)
            module="(modulename)"
            translate="[label][,description]"
            >
            <!-- definition -->
            <(/email_template_name)>
        </email>
    </template>
    <events>
        <(event_name)>
        <observers><!-- observers --></observers>
        </(event_name)>
    </events>
    <eav_attributes><!-- definition --></eav_attributes>
    <(modulename)><!-- custom config variables --></(modulename)>
</global>

models
resources
blocks
helpers
fieldsets
template
events
eav_attributes
(modulename)	自定义的变量(如设置邮件或newletter时非常有用)
-----------------------------------------
admin
XML Structure
<admin>
    <attributes>
        <(attribute_name) />
        <attributes>
            <fieldsets><!-- definition --></fieldsets>
            <routers>
                <(modulename)>
                <use>[standard|admin|default]</use>
                <args>
                    <module>(NameSpace_ModuleName)</module>
                    <frontName>(frontname)</frontName>
                </args>
                </(modulename)>
                <!-- or -->
                <(modulename)>
                <args>
                    <modules>
                        <(NameSpace_ModuleName)
                        before="(AnotherNameSpace_ModuleName)"
                        >
                        (New_ClassName)
                        <(NameSpace_ModuleName)
                    </args>
                    </(modulename)>
                </routers>
            </admin>
            Elements
            Element	Description
            attributes
            fieldsets
            routers
            ----------------------------------------
            adminhtml
            XML Structure
            <adminhtml>
                <events>
                    <event_name>
                    <observers><!-- observers --></observers>
                    </event_name>
                </events>
                <global_search>
                <products>
                    <class>(modulename)/search_catalog</class>
                    <acl>catalog</acl>
                </products>
                <customers>
                    <class>adminhtml/search_customer</class>
                    <acl>customer</acl>
                </customers>
                <sales>
                    <class>adminhtml/search_order</class>
                    <acl>sales</acl>
                </sales>
                </global_search>
                <translate>
                    <modules>
                        <NameSpace_ModuleName>
                        <files>
                            <default>(name_of_translation_file.csv)</default>
                        </files>
                        </NameSpace_ModuleName>
                    </modules>
                </translate>
                <layout>
                    <updates>
                        <(modulename)>
                        <file>(name_of_layout_file.xml)</file>
                        </(modulename)>
                    </updates>
                </layout>
                <(modulename)><!-- custom config variables --></(modulename)>
            </adminhtml>
            Elements
            Element	Description
            events
            global_search
            translate
            layout
            (modulename)	自定义变量
            ---------------------------------------------
            install
            XML Structure

            ------------------------------------------
            frontend
            XML Structure
            <frontend>
                <secure_url>
                <(page_handle)>/relative/url</page_handle>
                </secure_url>
                <events>
                    <(event_name)>
                    <observers><!-- observers --></observers>
                    </(event_name)>
                </events>
                <routers>
                    <(modulename)>
                    <use>[standard|admin|default]</use>
                    <args>
                        <module>(NameSpace_ModuleName)</module>
                        <frontName>(frontname)</frontName>
                    </args>
                    </(modulename)>
                </routers>
                <translate>
                    <modules>
                        <(NameSpace_ModuleName)>
                        <files>
                            <default>(name_of_translation_file.csv)</default>
                        </files>
                        </(NameSpace_ModuleName)>
                    </modules>
                </translate>
                <layout>
                    <updates>
                        <(modulename)>
                        <file>(name_of_layout_file.xml)</
                            </(modulename)>
                        </updates>
                    </layout>
                </frontend>
                Elements
                Element	Description
                secure_url
                events
                routers
                translate
                layout
                default
                XML Structure
                stores
                XML Structure
                websites
                XML Structure

                -----------------system.xml-------------------------------------
                -----------2014-09-12--------------------------------------
                url地址解析
                输入网址->Index.php->Url路由->Conntroller(action(model))->{layout:handle[s]->block[s](type(model(db))+template)}=>(page:html+js+css)->web UI
                page:html(submit)->Index.php->Conntroller(action(model::save()))->更新过后的webhtml>>>>>

                -----------2014-09-14---------------------------------------
                ------------数据模型
                Magento中非EAV Model继承自Mage_Core_Model_Abstract,需要实现_construct方法

                protected function _construct(){
                $this->_init('Model tag 名/ResourceModel tag名');

            }
            先通过model的tag找到model的resource model的定义标签， 再从resource model的定义标签中找到对应的resource model名字。
            ----------资源模型
            非EAV ResourceModel继承自Mage_Core_Model_Mysql4_Abstract, 里面也需要实现
            <?php
            protected function _construct(){
                $this->_init('Model tag 名/ResourceModel tag名','表格主键列名');
            }

            Magento的模型并不直接访问数据库。每一个模型都有一个资源模型（Resource Model），每一个资源模型拥有两个适配器（Adapter），一个读，一个写。这样的话逻辑模型和数据库访问就分开了，所以从理论上讲更改底层数据库 只需要重写适配器就可以了，所有上层代码都不需要更改。

            1. 到管理页面 admin 然后 System -> Configuration
            2. 选择你的网店 （通过 website/store selector）
            3. 页面刷新后，选 'Developer' tab ，然后在Template Path Hints 选'Yes'.
            做完之后回到前台，刷新页面之后你就可以看到所有模板列表的路径了

            ----------2014-09-15--------------------------------------------------------
            magento调用静态块block的方法  
            1.cms page页的content加入: 
            {{block type="cms/block" block_id="mvcview"  template="cms/content.phtml"}} 

            2、直接在模板的 .phtml 中调用 <?php  
            echo $this->getLayout()->createBlock('cms/block')->setBlockId('blockcallnew')->toHtml(); ?> 

            3.、直接在HomePage中调用（只限首页）： 修改layout中的xml代码 
            <reference name=”content”> 
                <block type=”cms/block” name=”blockname” before=”-”>
                     <action method=”setBlockId”><id>block_id</id></action> </block> 
                 </reference> 
                通过修改reference 中的name属性值调整主体位置，通过block中的before或after属性值调整相对顺序 
                CMS 页以及static block还可以通过如下方法调用： 
                {{block type=”cms/block”  name=”user-block”  block_id=”one-block”}} (其中的name为自定义的，block_id 为静态块的 identi)  
                2、直接在模板的 .phtml 中调用 <?php echo $this->getLayout() ->createBlock(‘cms/block’) ->setBlockId(‘block_id’) ->toHtml(); ?> 
                3、在对应的 .xml 中的目标位置调用 
                <block type=”cms/block” name=”blockname” as=”blockname” before=”-”>
                     <action method=”setBlockId”><id>block_id</id></action> 
                 </block> 
                <!– 修改其中的 name  as 以及id 确保正确调用，修改before参数确保位置正确 –> 4、使用 getChildHtml() 方法调用（类似方法3）: 
                首先在page.xml文件中定义一个childhtml名称（这边用test代替） 可以参考before_body_end那段代码 
                <block type=”core/text_list” name=”before_body_end” as=”before_body_end”/> 定义自己需要的如： 
                <block type=”core/text_list” name=”test” as=”test”/> 
                然后将调用的代码添加到对应的XML布局文件的正确位置 
                例如这边我们插入到catalog.xml 中的<default>块中，这样就可以在任意页面调用，当然你也可以加到你想要的页面中。 <default><!–位于30行左右–>
                 <reference name=”test”> 
                    <block type=”cms/block” name=”testname” before=”-”>
                         <action method=”setBlockId”><id>testblock</id></action> </block> 
                     </reference>
                    <?php
                    添加static block名称为testblock 
                    内容自己定义，
                    如：<h1>This is a test Block!</h1> 到你想让这块内容出现的页面调用它 这边我们在1column.phtml中调用 
                     echo $this->getChildHtml(‘test’)
                    ---------2014-09-16-----------------------------------------
                    eav model

                    所有的价格以及其它decimal属性的会存储在表catalog_product_entity_decimal中，另外所有文本类 型数据会存储在catalog_product_varchar中，需要指出的是每个属性存储的表，magento在eav_attribute表中使用 字段backend_type记录
                    不论何种数据类型，所有的值都存为varchar

                    Magento中包含多个实体，例如：客户，订单，发票和产品-只保存了几类的信息，如实体类型，型号（SKU）以及产品创建时间

                    eav_attribute中有过entity_type_id找到要设置产品的那一属性。记录了Magento所有实体的全部属性,也包含每一记录的元信息，如数据类型、前端细节等,属性的名称被记录为attribute_code，元数据信息中，一个重要的列为backend_type，这表明一属性为何种数据类型，该属性的值存在何处---允许的数据类型static datetime decimal int text varchar



                    ------------2014-09-17---------------------------------------
                    block中
                    $this->setTemplate(‘模板路径’);
                    eav
                    不足之处是没有一个单一的简单的SQL查询，你可以用它来获得所有的产品数据。几个简单的SQL查询或一个大的联接需要进行
                    eav_entity_type
                    此表包含系统中所有的entity_types的列表。 entity_type_code---唯一标识符。
                    magento自带的模块涉及到EAV模型的collection最终都是继承自Mage_Eav_Model_Entity_Collection_Abstract
                    为每个属性类型添加表
                    dispatchEvent
                    Mage::app()->getStore()->getWebsiteId()

                    Mage::helper():
                    Mage::register()---在Mage类中使用$_registry存储生成的对象，这样生成的对象在全局都可以访问
                    Mage::getStoreConfig()

                    php函数
                    get_magic_quotes_gpc--判断解析用户提示的数据，如包括有:post、get、cookie过来的数据增加转义字符“ ”，以确保这些数据不会引起程序，特别是数据库语句因为特殊字符引起的污染而出现致命的错误
                    set_error_handler--设置用户自定义的错误处理函数
                    int memory_get_usage ([ bool $real_usage = false ] ) --获取PHP内存清耗量的方法

                    ---------------2014-09-18-----------------------------------------------
                    Mage::getStoreConfig();
                    重载(overload)、覆盖(override)、隐藏(hide);
                    array_merge()与"+"
                    当用加号合并数组时，如果数组间存在同名的键，那么保留前面数组对应的键值而array_merge()函数正好相反
                    如果array_merge() 函数输入了一个数组，且键名是整数，则该函数将返回带有整数键名的新数组，索引以0开始
                    setType()
                    问题 app() register()函数的意义
                    --------------2014-09-19-------------------------------------------------
                    $this->__('Browse By');
                    $this->__('Category');
                    $this->escapeHtml();
                    $this->helper('catalog/output');
                    $this->getConfig();
                    Mage::dispatchEvent(参数)
                    getUrl()--Mage_Core_Block_Abstract
                    new ReflectionClass('Mage');
                    -------------2014-10-08----------------------------------------------------
                    获取系统的字符集：
                    Mage::getStoreConfig('design/head/default_charset')

获取 http://magentonotes.com/
echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);

获取 http://magentonotes.com/js/
echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_JS);

获取 http://magentonotes.com/index.php/
echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_LINK);

获取 http://magentonotes.com/media/
echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA);

获取 http://magentonotes.com/skin/
echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN);

简化操作：
echo Mage::getBaseUrl('skin'); echo Mage::getBaseUrl('media'); echo Mage::getBaseUrl('js');

//获取首页
echo Mage::helper('core/url')->getHomeUrl();

//返回当前页面的路径
echo Mage::helper('core/url')->getCurrentUrl();

//显示登录路径
echo $this->getUrl('customer/account/login');

//显示图片的方法：
echo $this->getSkinUrl('images/qty.gif').

--------------------2014-10-09----------------------------------------------------
1：获取session

$session = Mage::getSingleton('customer/session');
2:Request对象

Mage::app()->getRequest()
3:调用Model对象

Mage::getModel('infinity/model');
4:获取当前时间

Mage::getModel('core/date')->date();date("Y-m-d", Mage::getModel('core/date')->timestamp(time()));
5：session,cookie设置

5.1  Model：

Mage::getModel(‘core/cookie’);Mage::getModel(‘core/session’);
5.2 Set Method:

Mage::getSingleton(‘core/cookie’)->set(‘name’,'value’);Mage::getSingleton(‘core/session’)->set(‘name’,'value’);
5.3 Get method:

Mage::getSingleton(‘core/cookie’)->get(‘name’);Mage::getSingleton(‘core/session’)->get(‘name’);
6:输出配置文件

//header(‘Content-Type: text/xml’);header(‘Content-Type: text/plain’);echo $config = Mage::getConfig()->loadModulesConfiguration(‘system.xml’)->getNode()->asXML();exit;
7：Get URL for a Magento Category

Mage::getModel('catalog/category')->load(17)->getUrl();
8：build your URL with valid keys

Mage::helper("adminhtml")->getUrl("mymodule/adminhtml_mycontroller/myaction/",array("param1"=>1,"param2"=>2));
9：create key values

Mage::getSingleton('adminhtml/url')->getSecretKey("adminhtml_mycontroller","myaction");
10：disable security feature in the admin panel

admin panel -> System -> Configuration -> Admin section: “Add Secret key to Urls”.
11：后台模块跳转：

Mage::app()->getResponse()->setRedirect(Mage::helper('adminhtml')->getUrl("adminhtml/promo_quote/index"));
12：产品属性操作

$product = Mage::getModel('catalog/product')->getCollection()->getFirstItem();
foreach($product->getAttributes() as $att){
	$group_id = $att->getData('attribute_group_id');
	$group  = Mage::getModel('eav/entity_attribute_group')->load($group_id);
	var_dump($group);
}
$attrSetName = 'my_custom_attribute';
$attributeSetId = Mage::getModel('eav/entity_attribute_set')->load($attrSetName, 'attribute_set_name')->getAttributeSetId();

13：get a drop down lists options for a mulit-select attribute

$attribute = Mage::getModel('eav/config')->getAttribute('catalog_product', 'attribute_id');
foreach ( $attribute->getSource()->getAllOptions(true, true) as $option){$attributeArray[$option['value']] = $option['label'];}

14：或取栏目图片

public function getImageUrl($category){
	return Mage::getModel('catalog/category')->load($category->getId())->getImageUrl();
}
public function getThumbnailUrl($category){
	$image=Mage::getModel('catalog/category')->load($category->getId())->getThumbnail();
	if ($image) {
		$url = Mage::getBaseUrl('media').'catalog/category/'.$image;
  }
  return $url;
}

15：产品缩略图

$_thumb = Mage::helper('catalog/image')->init($product, 'thumbnail')->resize(50, 50)->setWatermarkSize('30x10');

16：判断是否首页：$this->getIsHomePage()

(Mage::getSingleton('cms/page')->getIdentifier() == 'home'&& Mage::app()->getFrontController()->getRequest()->getRouteName() == 'cms');

17：cms

$cms_id = Mage::getSingleton('cms/page')->getIdentifier();
$cms_title = Mage::getSingleton('cms/page')->getTitle();
$cms_content = Mage::getSingleton('cms/page')->getContent();

18 :

$attributes = $_product->getAttributes();
$themeColor = $attributes['theme_color']->getFrontend()->getValue($_product);

19：获取configurable产品simple product

if($_product->getTypeId() == "configurable"):
	$ids = $_product->getTypeInstance()->getUsedProductIds();
foreach ($ids as $id) :
  $simpleproduct = Mage::getModel('catalog/product')->load($id);
$simpleproduct->getName()." - ".(int)Mage::getModel('cataloginventory/stock_item')->loadByProduct($simpleproduct)->getQty();
$childProducts = Mage::getModel('catalog/product_type_configurable')->getUsedProducts(null, $product);
endforeach;
endif;

20:get the attributes of Configurable Product.

$attributes = $product->getTypeInstance(true)->getConfigurableAttributes($product);

21：当前路径

$currentUrl = $this->helper('core/url')->getCurrentUrl();

22:通过资源配置方式创建目录

$installer = $this;
$installer->startSetup();
// make directory for font cachetry {$domPdfFontCacheDir = join(DS, array('lib', 'Symmetrics', 'dompdf', 'fonts'));$domPdfFontCacheDir = Mage::getBaseDir('var') . DS . $domPdfFontCacheDir;if (!file_exists($domPdfFontCacheDir)) {mkdir($domPdfFontCacheDir, 0777, true);}} catch(Exception $e) {throw new Exception('Directory ' . $domPdfFontCacheDir . ' is not writable or couldn\'t be '. 'created. Please do it manually.' . $e->getMessage());}$installer->endSetup();


23：
<reference name="top.links">
<block type="wishlist/links" name="wishlist_link"/>
<action method="addLinkBlock"><blockName>wishlist_link</blockName></action>
</reference>
<reference name="top.links">
<action method="addLink" translate="label title" module="customer"><label>Home</label><url></url><title>Home</title><prepare>true</prepare><urlParams/><position>0</position></action>
<action method="addLink" translate="label title" module="customer"><label>Help</label><url>help</url><title>Help</title><prepare>true</prepare><urlParams/><position>90</position></action>
<action method="addLink" translate="label title" module="customer"><label>My Account</label><url helper="customer/getAccountUrl"/><title>My Account</title><prepare/><urlParams/><position>10</position></action>
</reference>
<reference name="top.links">
<action method="addLink" translate="label title"><label>example</label><url>example</url><title>example</title><prepare>true</prepare><urlParams helper="core/url/getHomeUrl"/><position>100</position><liParams/><aParams>class="top-link-example"</aParams><beforeText></beforeText><afterText></afterText></action>
</reference>

24：在controllers 实现跳转

Mage::app()->getFrontController()->getResponse()->setRedirect('http://your-url.com');

25：获取当前站点货币符号

$storeId = (int) $this->getRequest()->getParam('store', 0);
$store=Mage::app()->getStore($storeId);
$currencyCode=$store->getBaseCurrency()->getCode()$attribute = Mage::getModel('catalog/resource_eav_attribute')->load($attributeId);$attributeData = $attribute->getData();
$frontEndLabel = $attributeData['frontend_label'];
$attributeOptions = $attribute->getSource()->getAllOptions();

26：获取产品属性集

$sets = Mage::getResourceModel('eav/entity_attribute_set_collection')
->setEntityTypeFilter(Mage::getModel('catalog/product')
    ->getResource()->getTypeId())->load()->toOptionHash();

27:magento使用sql
$resource = Mage::getSingleton('core/resource');
$read= $resource->getConnection('core_read');
$tempTable = $resource->getTableName('infinity_contacts');
$_storeid = Mage::app()->getStore()->getId();
$wheres = "`status`=1 AND ( FIND_IN_SET(0, `store_id`)>0 OR FIND_IN_SET($_storeid, `store_id`)>0 )";
$select = $read->select()->from($tempTable, array('count(*) as num'))->where($wheres);

28：设置meta信息

$template = Mage::getConfig()->getNode('global/page/layouts/'.Mage::getStoreConfig("featuredproducts/general/layout").'/template');
$this->loadLayout();
$this->getLayout()->getBlock('root')->setTemplate($template);
$this->getLayout()->getBlock('head')->setTitle($this->__(Mage::getStoreConfig("featuredproducts/general/meta_title")));
$this->getLayout()->getBlock('head')->setDescription($this->__(Mage::getStoreConfig("featuredproducts/general/meta_description")));
$this->getLayout()->getBlock('head')->setKeywords($this->__(Mage::getStoreConfig("featuredproducts/general/meta_keywords")));
$this->renderLayout();


Zend_Debug::dump($shippingFlag);


-----------------2014-10-11-------------------------------------------
自签证书 三步
openssl genrsa -out $1.key 2048
openssl req -new -nodes -key $1.key -out $1.csr
openssl x509 -req -days 3650 -in $1.csr -signkey $1.key -out $1.crt

<VirtualHost *:80>
ServerAdmin webmaster@localhost
ServerName example.com
DocumentRoot /var/www

</VirtualHost>
---------------------
.conf  文件配置

<IfModule mod_ssl.c>
<VirtualHost *:443>

ServerAdmin webmaster@localhost
ServerName example.com
DocumentRoot /var/www

        #   SSL Engine Switch:
        #   Enable/Disable SSL for this virtual host.
SSLEngine on

        #   A self-signed (snakeoil) certificate can be created by installing
        #   the ssl-cert package. See
        #   /usr/share/doc/apache2.2-common/README.Debian.gz for more info.
        #   If both key and certificate are stored in the same file, only the
        #   SSLCertificateFile directive is needed.
SSLCertificateFile /etc/apache2/ssl/example.com/apache.crt
SSLCertificateKeyFile /etc/apache2/ssl/example.com/apache.key
</VirtualHost>

</IfModule>

----------------前台控制器重写config.xml配置---------------------------
<config>
<frontend>
<routers>
<cms>
<args>
<modules>
<Silk_Cms before="Mage_Cms">Silk_Cms</Silk_Cms>
</modules>
</args>
</cms>
</routers>
</frontend>
</config>
----------------------------------------------------------------------
shell 索引命令
php indexer.php reindex --all   ------- 大部分报错原因是未安装PHP模块sudo apt-get install php5-snmp

---------------magento 增、删、改、查----------------------------------
require_once 'path/to/Mage/Directory/app/Mage.php';
Mage::app('default');
Select
$connection = Mage::getSingleton('core/resource')->getConnection('core_read');

$select = $connection->select()
    ->from('tablename', array('*')) // select * from tablename or use array('id','title') selected values
    ->where('id=?',1)               // where id =1
    ->group('title');               // group by title

$rowsArray = $connection->fetchAll($select); // return all rows
$rowArray =$connection->fetchRow($select);   //return row

$connection = Mage::getSingleton('core/resource')->getConnection('core_write');

$connection->beginTransaction();

$__fields = array();
$__fields['title'] = 'The Loving Mangki';
$__fields['age'] = '19';
$connection->insert('tablename', $__fields);

$connection->commit();
Update

$connection = Mage::getSingleton('core/resource')->getConnection('core_write');

$connection->beginTransaction();

$__fields = array();
$__fields['title'] = 'The Loving Babi';
$__where = $connection->quoteInto('id =?', '1');
$connection->update('tablename', $__fields, $__where);

$connection->commit();
Delete

$__condition = array($connection->quoteInto('id=?', '1'));
$connection->delete('tablename', $__condition);

-----------------------------------------------------------------------------
writing output to the log
Mage::log($data)------>open up var/log/system.log

refresh automatically when newoutput is appended to the log

tail -f var/log/system.log


<?xml version="1.0"?>
<!--
/**
* Module configuration
*
* @author Magento
*/
-->
<config>
    <modules>
        <Magentostudy_News>
        <version>1.0.0.0.1</version>
        </Magentostudy_News>
    </modules>
    <global>
        <models>
            <magentostudy_news>
            <class>Magentostudy_News_Model</class>
            <resourceModel>news_resource</resourceModel>
            </magentostudy_news>
            <news_resource>
            <class>Magentostudy_News_Model_Resource</class>
            <entities>
                <news>
                    <table>magentostudy_news</table>
                </news>
            </entities>
            </news_resource>
        </models>
        <helpers>
            <magentostudy_news>
            <class>Magentostudy_News_Helper</class>
            </magentostudy_news>
        </helpers>
        <blocks>
            <magentostudy_news>
            <class>Magentostudy_News_Block</class>
            </magentostudy_news>
        </blocks>
        <resources>
            <magentostudy_news_setup>
            <setup>
                <module>Magentostudy_News</module>
                <class>Mage_Core_Model_Resource_Setup</class>
            </setup>
            </magentostudy_news_setup>
        </resources>
        <events>
            <before_news_item_display>
            <observers>
                <magentostudy_news>
                <class>magentostudy_news/observer</class>
                <method>beforeNewsDisplayed</method>
                </magentostudy_news>
            </observers>
            </before_news_item_display>
        </events>
    </global>
    <frontend>
        <routers>
            <magentostudy_news>
            <use>standard</use>
            <args>
                <module>Magentostudy_News</module>
                <frontName>news</frontName>
            </args>
            </magentostudy_news>
        </routers>
        <layout>
            <updates>
                <magentostudy_news>
                <file>magentostudy_news.xml</file>
                </magentostudy_news>
            </updates>
        </layout>
    </frontend>
    <Admin>
        <routers>
            <adminhtml>
                <args>
                    <modules>
                        <Magentostudy_News
                        before="Mage_adminhtml">Magentostudy_News_adminhtml</Magentostudy_News>
                    </modules>
                </args>
            </adminhtml>
        </routers>
    </Admin>
    <adminhtml>
        <layout>
            <updates>
                <magentostudy_news>
                <file>magentostudy_news.xml</file>
                </magentostudy_news>
            </updates>
        </layout>
    </adminhtml>
    <default>
        <news>
            <view>
                <enabled>1</enabled>
                <items_per_page>20</items_per_page>
                <days_difference>3</days_difference>
            </view>
        </news>
    </default>
</config>

<?php
save attribute
$product->getResource()->saveAttribute($product, "attribute");

The Six Block Lifecycle Callbacks
callback:_construct();
callback:_prepareLayout();
callback:beforeToHtml();
callback:_afterToHtml();
callback:_toHtml();
callback:_beforeChildToHtml();

--------------------------------------------------
Callback: _construct()
The _construct method is Magento’s internal (or “pseudo”) constructor.
 All objects that inherit from Varien_Object (which includes blocks) have this callback, which is called when you instantiate a block.
 This method isn’t specific to blocks, but its behavior is close enough to warrant its inclusion in our lifecycle callback lineup.

Callback: _prepareLayout()
The _prepareLayout() method is called immediately after a block has been added to the layout object for the first time.
If this seems vague don’t worry, we’ll get to some specifics in a moment.

Callback: _beforeToHtml()
The _beforeToHtml() method is called immediately before a block’s HTML content is rendered.

Callback: _afterToHtml($html)
The _afterToHtml method is called immediately after a block’s HTML content is generated.
 It’s also the only method with both a method parameter and a required return value. Whatever
 content is returned from your _afterToHtml method call will become the rendered content for that block. So the following

class Packagename_Namespace_Block_Model extends Mage_Core_Block_Template
{
    protected function _afterToHtml($html)
    {
        return $html . '<div>Killroy was here</div>';
    }
}
would automatically add the text

<div>Killroy was here</div>
to the end of your block when it rendered. However, failure to return a value
class Packagename_Namespace_Block_Model extends Mage_Core_Block_Template
{
    protected function _afterToHtml($html)
    {
        Mage::Log("I just rendered " . $this->getName());
    }
}
would result in an empty block being rendered. Make sure you don’t forget your return value if you’re using _afterToHtml.

Callback: _toHtml()
The _toHtml method is another questionable inclusion in the lifecycle lineup.
The _toHtml method is where you put the code that should render your block. You’ll see a little later why we’re including this as a lifecycle callback.

Callback: _beforeChildToHtml($name, $block)
Finally, there’s the little known _beforeChildToHtml method. In Magento,
a layout is a nested tree structure of blocks,
with parent blocks rendering child blocks. When a parent renders one of its children (through a call to $this->getChildHtml('name')),
this method is called immediately before rendering the child.


Mage::getSingleton('core/session')->getMessages(true); // The true is for clearing them after loading them
-------2015-05-20-------------------
Form admin allows user to enter and save data into the database. A magento form includes the 5 following elements:
Form Container
Form tag
Form tabs
Form action button
Form fields

1.Create action to display the magento form in backend
app/code/local/Magestore/Lesson09/controllers/Adminhtml/Lesson09Controller.php
public function newAction(){
$this->loadLayout();
$this->_setActiveMenu('lesson09/items');
$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

$this->_addContent($this->getLayout()->createBlock(' lession09/adminhtml_lession09_edit'))
->_addLeft($this->getLayout()
->createBlock('lession09/adminhtml_lession09_edit_tabs'));
$this->renderLayout();
}
------------
public function newAction() {
$this->_forward('edit');
}
---------------------
public function editAction() {
	$id = $this->getRequest()->getParam('id');
	$model = Mage::getModel('lesson09/lesson09')->load($id);

	if ($model->getId() || $id == 0) {
	$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
	if (!empty($data)) {
	$model->setData($data);
	}

	Mage::register('lesson09_data', $model);

	$this->loadLayout();
	$this->_setActiveMenu('lesson09/items');

	$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
	$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

	$this->_addContent($this->getLayout()->createBlock(' lession09/adminhtml_lession09_edit'))
	->_addLeft($this->getLayout()
	->createBlock('lession09/adminhtml_lession09_edit_tabs'));
	$this->renderLayout();
	} else {
	Mage::getSingleton('adminhtml/session')->addError(Mage::helper('lesson09')->__('Item does not exist'));
	$this->_redirect('*/*/');
	}
}
2.Create blocks in magento backend
app/code/local/Magestore/Lesson09/Block/Adminhtml/Lesson09/Edit.php
class Magestore_Lesson09_Block_Adminhtml_Lesson09_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
		parent::__construct();

		$this->_objectId = 'id';
		$this->_blockGroup = 'lesson09';
		$this->_controller = 'adminhtml_lesson09';

		$this->_updateButton('save', 'label', Mage::helper('lesson09')->__('Save'));
		$this->_updateButton('delete', 'label', Mage::helper('lesson09')->__('Delete'));

		$this->_addButton('saveandcontinue', array(
		'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
		'onclick' => 'saveAndContinueEdit()',
		'class' => 'save',
		), -100);
          $this->_formScripts[] = "
         function toggleEditor() {
         if (tinyMCE.getInstanceById('salestaff_content') == null) {
         tinyMCE.execCommand('mceAddControl', false, 'salestaff_content');
         } else {
         tinyMCE.execCommand('mceRemoveControl', false, 'salestaff_content');
         }
         }
        function saveAndContinueEdit(){
         editForm.submit($('edit_form').action+'back/edit/');
         }";
		}

		public function getHeaderText()
		{
		return Mage::helper('lesson09')->__('My Form Container');
	}
}

app/code/local/Magestore/Lesson09/Block/Adminhtml/Lesson09/Edit/Form.php
class Excellence_Lesson09_Block_Adminhtml_Lesson09_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form(array(
		'id' => 'edit_form',
		'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
		'method' => 'post',
		'enctype' => 'multipart/form-data'
		)
		);$form->setUseContainer(true);
		$this->setForm($form);
		return parent::_prepareForm();
	}
}
App/code/local/Magestore/Lesson09/Block/Adminhtml/Lesson09/Edit/Tabs.php
class Magestore_Lesson09_Block_Adminhtml_Lesson09_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('form_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(Mage::helper('lesson09')->__('Lesson09 Information'));
		}
		protected function _beforeToHtml()
		{
		$this->addTab('form_section', array(
		'label' => Mage::helper('lesson09')->__('Item Information'),
		'title' => Mage::helper('lesson09')->__('Item Information'),
		'content' => $this->getLayout()->createBlock('lesson09/adminhtml_lesson09_edit_tab_form')->toHtml(),
		));
		return parent::_beforeToHtml();
	}
}
app/code/local/Magestore/Lesson09/Block/Adminhtml/Lesson09/Edit/Tab/Form.php
class Magestore_Lesson09_Block_Adminhtml_Lesson09_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('lession09_form',array('legend'=>Mage::helper('lession09')->__('Item information')));

		$fieldset->addField('title', 'text', array(
		'label' => Mage::helper('lession09')->__('Title'),
		'class' => 'required-entry',
		'required' => true,
		'name' => 'title',
		));

		$fieldset->addField('content', 'editor', array(
		'name' => 'content',
		'label' => Mage::helper('dochelp')->__('Content'),
		'title' => Mage::helper('dochelp')->__('Content'),
		'style' => 'width:700px; height:500px;',
		'wysiwyg' => false,
		'required' => true,
		));

		if ( Mage::getSingleton('adminhtml/session')->getlesson09Data() )
		{
		$form->setValues(Mage::getSingleton('adminhtml/session')->getlesson09Data());
		Mage::getSingleton('adminhtml/session')->setlesson09Data(null);
		} elseif ( Mage::registry('lesson09_data') ) {
		$form->setValues(Mage::registry('lesson09_data')->getData());
		}

		return parent::_prepareForm();
	}
}
3.1. Save Action
app/code/local/Magestore/Lesson09/controllers/Adminhtml/Lesson09Controller.php
