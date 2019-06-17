<?php

/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/12/24
 * Time: 10:37 PM
 */

namespace ESD\Plugins\WeChat\OfficialAccount;


class ApiUrl
{
    /**
     *
     */
    const NET_CHECK = '/cgi-bin/callback/check?access_token=ACCESS_TOKEN';

    /**
     *
     */
    const IP_LIST = '/cgi-bin/getcallbackip?access_token=ACCESS_TOKEN';

    /*
     * 获取ACCESS_TOKEN
     */
    const ACCESS_TOKEN = '/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APP_SECRET';

    /*
     * 获取微信服务器IP地址
     */
    const GET_CALLBACK_IP = '/cgi-bin/getcallbackip?access_token=ACCESS_TOKEN';

    /*
     * 网络检测
     */
    const CALLBACK_CHECK = '/cgi-bin/callback/check?access_token=ACCESS_TOKEN';

    /*
     * 获取临时素材
     */
    const MEDIA_GET = 'https://file.api.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id=MEDIA_ID';

    /*
     * 上传临时素材
     */
    const MEDIA_UPLOAD = '/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE';

    /**
     * 上传永久素材
     */
    const MATERIAL_UPLOAD = '/cgi-bin/material/add_material?access_token=ACCESS_TOKEN&type=TYPE';

    /**
     * 删除永久素材
     */
    const MATERIAL_DELETE = '/cgi-bin/material/del_material?access_token=ACCESS_TOKEN';

    /**
     * 获取永久素材
     */
    const MATERIAL_GET = '/cgi-bin/material/get_material?access_token=ACCESS_TOKEN';

    /**
     * 获取永久素材总数
     */
    const MATERIAL_COUNT = '/cgi-bin/material/get_materialcount?access_token=ACCESS_TOKEN';

    /**
     * 获取永久素材列表
     */
    const MATERIAL_LIST = '/cgi-bin/material/batchget_material?access_token=ACCESS_TOKEN';

    /*
     * 上传图文消息素材
     */
    const MATERIAL_UPLOAD_NEWS = '/cgi-bin/material/add_news?access_token=ACCESS_TOKEN';

    /**
     * 修改图文消息素材
     */
    const MATERIAL_UPDATE_NEWS = '/cgi-bin/material/update_news?access_token=ACCESS_TOKEN';

    /*
     * 上传图文消息内的图片获取URL
     */
    const MATERIAL_UPLOAD_NEWS_IMG = '/cgi-bin/media/uploadimg?access_token=ACCESS_TOKEN';

    /*
     * 根据标签进行群发图文消息
     */
    const MESSAGE_MASS_SEND_ALL = '/cgi-bin/message/mass/sendall?access_token=ACCESS_TOKEN';

    /*
     * 根据OpenID列表群发图文消息
     */
    const MESSAGE_MASS_SEND = '/cgi-bin/message/mass/send?access_token=ACCESS_TOKEN';

    /*
     * 删除群发图文消息
     */
    const MESSAGE_MASS_DELETE = '/cgi-bin/message/mass/delete?access_token=ACCESS_TOKEN';

    /*
     * 预览图文消息
     */
    const MESSAGE_MASS_PREVIEW = '/cgi-bin/message/mass/preview?access_token=ACCESS_TOKEN';

    /*
     * 查询群发消息发送状态
     */
    const MESSAGE_MASS_GET = '/cgi-bin/message/mass/get?access_token=ACCESS_TOKEN';

    /*
     * 获取群发速度
     */
    const MESSAGE_MASS_SPEED = '/cgi-bin/message/mass/speed/get?access_token=ACCESS_TOKEN';

    /*
     * 发送客服消息
     */
    const MESSAGE_CUSTOM_SEND = '/cgi-bin/message/custom/send?access_token=ACCESS_TOKEN';

    /*
     * 获取用户关注列表
     */
    const USER_GET = '/cgi-bin/user/get?access_token=ACCESS_TOKEN&next_openid=NEXT_OPENID';

    /*
     * 获取用户基本信息
     */
    const USER_INFO = '/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid=OPENID&lang=LANG';

    /**
     * 批量获取用户信息
     */
    const USER_INFO_BATCHGET = '/cgi-bin/user/info/batchget?access_token=ACCESS_TOKEN';

    /**
     * 设置用户备注
     */
    const USER_UPDATEREMARK = '/cgi-bin/user/info/updateremark?access_token=ACCESS_TOKEN';

    /**
     * 获取黑名单列表
     */
    const GET_BLACKLIST = '/cgi-bin/tags/members/getblacklist?access_token=ACCESS_TOKEN';

    /**
     * 添加黑名单
     */
    const BATCH_BLACKLIST = '/cgi-bin/tags/members/batchblacklist?access_token=ACCESS_TOKEN';

    /**
     * 移出黑名单
     */
    const BATCH_UNBLACKLIST = '/cgi-bin/tags/members/batchunblacklist?access_token=ACCESS_TOKEN';

    /**
     * 迁移Openid
     * by http://kf.qq.com/faq/170221aUnmmU170221eUZJNf.html
     */
    const CHANGE_OPENID = 'http://api.weixin.qq.com/cgi-bin/changeopenid?access_token=ACCESS_TOKEN';

    /**
     * 获取标签列表
     */
    const TAG_LIST = '/cgi-bin/tags/get?access_token=ACCESS_TOKEN';

    /**
     * 创建标签
     */
    const TAG_CREATE = '/cgi-bin/tags/create?access_token=ACCESS_TOKEN';

    /**
     * 编辑标签
     */
    const TAG_UPDATE = '/cgi-bin/tags/update?access_token=ACCESS_TOKEN';

    /**
     * 删除标签
     */
    const TAG_DELETE = '/cgi-bin/tags/delete?access_token=ACCESS_TOKEN';

    /**
     * 获取用户标签列表
     */
    const GET_USER_TAG_LIST = '/cgi-bin/tags/getidlist?access_token=ACCESS_TOKEN';

    /**
     * 使用标签获取用户列表
     */
    const GET_USER_LIST_OF_TAG = '/cgi-bin/user/tag/get?access_token=ACCESS_TOKEN';

    /**
     * 批量设置用户标签
     */
    const BATCH_TAGGING = '/cgi-bin/tags/members/batchtagging?access_token=ACCESS_TOKEN';

    /**
     * 批量移除用户标签
     */
    const BATCH_UNTAGGING = '/cgi-bin/tags/members/batchuntagging?access_token=ACCESS_TOKEN';

    /*
     * 查询分组
     */
    const GROUPS_GET = '/cgi-bin/groups/get?access_token=ACCESS_TOKEN';

    /*
     * 创建分组
     */
    const GROUPS_CREATE = '/cgi-bin/groups/create?access_token=ACCESS_TOKEN';

    /*
     * 修改分组名
     */
    const GROUPS_UPDATE = '/cgi-bin/groups/update?access_token=ACCESS_TOKEN';

    /*
     * 移动用户分组
     */
    const GROUPS_MEMBERS_UPDATE = '/cgi-bin/groups/members/update?access_token=ACCESS_TOKEN';

    /*
     * 查询用户分组ID
     */
    const GROUPS_GET_ID = '/cgi-bin/groups/getid?access_token=ACCESS_TOKEN';

    /*
     * 自定义菜单创建
     */
    const MENU_CREATE = '/cgi-bin/menu/create?access_token=ACCESS_TOKEN';

    /*
     * 自定义菜单查询
     */
    const MENU_GET = '/cgi-bin/menu/get?access_token=ACCESS_TOKEN';

    /*
     * 自定义菜单删除
     */
    const MENU_DELETE = '/cgi-bin/menu/delete?access_token=ACCESS_TOKEN';

    /*
     * 创建个性化菜单
     */
    const MENU_ADD_CONDITIONAL = '/cgi-bin/menu/addconditional?access_token=ACCESS_TOKEN';

    /**
     * 测试个性化菜单
     */
    const MENU_MATCH_CONDITIONAL = '/cgi-bin/menu/trymatch?access_token=ACCESS_TOKEN';

    /**
     * 删除个性化菜单
     */
    const MENU_DELETE_CONDITIONAL = '/cgi-bin/menu/delconditional?access_token=ACCESS_TOKEN';

    /*
     * 获取自定义菜单配置
     */
    const GET_CURRENT_SELFMENU_INFO = '/cgi-bin/get_current_selfmenu_info?access_token=ACCESS_TOKEN';

    /**
     * 发送模板消息
     */
    const TEMPLATE_SEND = '/cgi-bin/message/template/send?access_token=ACCESS_TOKEN';

    /**
     * 删除模板消息
     */
    const TEMPLATE_DELETE = '/cgi-bin/template/del_private_template?access_token=ACCESS_TOKEN';

    /**
     * 获取模板消息列表
     */
    const TEMPLATE_GET_ALL = '/cgi-bin/template/get_all_private_template?access_token=ACCESS_TOKEN';

    /**
     * 添加模板消息
     */
    const TEMPLATE_ADD = '/cgi-bin/template/api_add_template?access_token=ACCESS_TOKEN';

    /**
     * 设置所属行业
     */
    const TEMPLATE_SET_INDUSTRY = '/cgi-bin/template/api_set_industry?access_token=ACCESS_TOKEN';

    /**
     * 获取行业信息
     */
    const TEMPLATE_GET_INDUSTRY = '/cgi-bin/template/get_industry?access_token=ACCESS_TOKEN';

    /**
     * 发送一次性订阅消息
     */
    const TEMPLATE_SEND_SUBSCRIBE = '/cgi-bin/message/template/subscribe?access_token=ACCESS_TOKEN';

    /*
     * 客服消息-添加客服账号
     */
    const CUSTOM_SERVICE_KF_ACCOUNT_ADD = '/customservice/kfaccount/add?access_token=ACCESS_TOKEN';

    /*
     * 客服消息-修改客服账号
     */
    const CUSTOM_SERVICE_KF_ACCOUNT_UPDATE = '/customservice/kfaccount/update?access_token=ACCESS_TOKEN';

    /*
     * 客服消息-删除客服账号
     */
    const CUSTOM_SERVICE_KF_ACCOUNT_DELETE = '/customservice/kfaccount/del?access_token=ACCESS_TOKEN';

    /*
     * 客服消息-设置客服账号的头像
     */
    const CUSTOM_SERVICE_KF_ACCOUNT_UPLOAD_HEAD_IMG = 'http://api.weixin.qq.com/customservice/kfaccount/uploadheadimg?access_token=ACCESS_TOKEN&kf_account=KFACCOUNT';

    /*
     * 客服消息-获取所有客服账号
     */
    const CUSTOM_SERVICE_GET_KF_LIST = '/cgi-bin/customservice/getkflist?access_token=ACCESS_TOKEN';

    /*
     * 客服消息-客服输入状态
     */
    const MESSAGE_CUSTOM_TYPING = '/cgi-bin/message/custom/typing?access_token=ACCESS_TOKEN';

    /*
     * 创建二维码ticket
     */
    const QRCODE_CREATE = '/cgi-bin/qrcode/create?access_token=ACCESS_TOKEN';

    /*
     * 换取二维码
     */
    const SHOW_QRCODE = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=TICKET';

    /*
     * 设备授权-获取deviceid和二维码
     */
    const DEVICE_GET_QRCODE = '/device/getqrcode?access_token=ACCESS_TOKEN';

    /* 
     * 设备授权-利用deviceid更新设备属性
     */
    const DEVICE_AUTHORIZE_DEVICE = '/device/authorize_device?access_token=ACCESS_TOKEN';

    /*
     * 验证设备二维码
     * */
    const DEVICE_VERIFY_QRCODE = '/device/verify_qrcode?access_token=ACCESS_TOKEN';

    /*
     * 查询设备状态
     * */
    const DEVICE_GET_STAT = '/device/get_stat?access_token=ACCESS_TOKEN&device_id=DEVICE_ID';

    /*
     * 设备绑定-绑定成功通知
     * */
    const DEVICE_BIND = '/device/bind?access_token=ACCESS_TOKEN';

    /*
     * 设备绑定-强制绑定用户和设备
     * */
    const DEVICE_COMPEL_BIND = '/device/compel_bind?access_token=ACCESS_TOKEN';

    /*
     * 设备解绑-解绑成功通知
     * */
    const DEVICE_UNBIND = '/device/unbind?access_token=ACCESS_TOKEN';


    /*
     * 设备解绑-强制解绑用户和设备
     * */
    const DEVICE_COMPEL_UNBIND = '/device/compel_unbind?access_token=ACCESS_TOKEN';

    /*
     * 查询设备绑定的用户
     * */
    const DEVICE_GET_OPENID = '/device/get_openid?access_token=ACCESS_TOKEN&device_type=DEVICE_TYPE&device_id=DEVICE_TYPE';

    /*
     * 查询用户绑定的设备
     * */
    const DEVICE_GET_BIND_DEVICE = '/device/get_bind_device?access_token=ACCESS_TOKEN&openid=OPENID';

    /*
     * 推送消息-发送设备消息
     * */
    const DEVICE_TRANS_MSG = '/device/transmsg?access_token=ACCESS_TOKEN';

    /*
     * 创建卡券
     * */
    const CARD_CREATE = '/card/create?access_token=ACCESS_TOKEN';

    /*
     * 创建卡券二维码获取ticket
     * */
    const CARD_QRCODE_CREATE = '/card/qrcode/create?access_token=ACCESS_TOKEN';

    /*
     * 设置卡券测试白名单
     * */
    const CARD_TEST_WHITELIST = '/card/testwhitelist/set?access_token=ACCESS_TOKEN';

    /*
     * 核销卡券
     * */
    const CARD_CONSUME = '/card/code/consume?access_token=ACCESS_TOKEN';

    /*
     * 打开已群发文章评论
     * */
    const COMMENT_OPEN = '/cgi-bin/comment/open?access_token=ACCESS_TOKEN';

    /*
     * 关闭已群发文章评论
     * */
    const COMMENT_CLOSE = '/cgi-bin/comment/close?access_token=ACCESS_TOKEN';

    /*
     * 查看文章评论数据
     * */
    const COMMENT_LIST = '/cgi-bin/comment/list?access_token=ACCESS_TOKEN';

    /*
     * 精选评论
     * */
    const COMMENT_MARKELECT = '/cgi-bin/comment/markelect?access_token=ACCESS_TOKEN';

    /*
    * 取消精选评论
    * */
    const COMMENT_UNMARKELECT = '/cgi-bin/comment/unmarkelect?access_token=ACCESS_TOKEN';

    /*
    * 删除评论
    * */
    const COMMENT_DELETE = '/cgi-bin/comment/delete?access_token=ACCESS_TOKEN';

    /*
    * 回复评论
    * */
    const COMMENT_REPLY_ADD = '/cgi-bin/comment/reply/add?access_token=ACCESS_TOKEN';

    /*
     * 删除回复评论
     * */
    const COMMENT_REPLY_DELETE = '/cgi-bin/comment/reply/delete?access_token=ACCESS_TOKEN';

    /**
     * 网页授权跳转链接
     */
    const JSAPI_AUTHORIZE = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect';

    /**
     * 网页授权CODE换取ACCESS_TOKEN
     */
    const JSAPI_CODE_TO_TOKEN = '/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code';

    /**
     * 网页授权令牌刷新
     */
    const JSAPI_REFRESH_TOKEN = '/sns/oauth2/refresh_token?appid=APPID&grant_type=refresh_token&refresh_token=REFRESH_TOKEN';

    /**
     * 网页授权获取用户信息
     */
    const JSAPI_SNS_USERINFO = '/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN';

    /**
     * 网页授权检验授权凭证
     */
    const JSAPI_SNS_AUTH_CHECK = '/sns/auth?access_token=ACCESS_TOKEN&openid=OPENID';

    /**
     * 获取JSSDK授权票据
     */
    const JSAPI_GET_TICKET = '/cgi-bin/ticket/getticket?access_token=ACCESS_TOKEN&type=jsapi';

    /**
     * @param string $baseUrl
     * @param array $data
     * @return string
     */
    public static function generateURL(string $baseUrl, array $data): string
    {
        foreach ($data as $key => $item) {
            $baseUrl = str_replace($key, $item, $baseUrl);
        }
        return $baseUrl;
    }
}