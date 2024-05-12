import 'package:json_annotation/json_annotation.dart';

part 'title.g.dart';

@JsonSerializable()
class Title {
  @JsonKey(fromJson: _titleFromJson,name: 'pt-br')
  String? ptBr;

  Title({this.ptBr});

  static String _titleFromJson(dynamic json) {
    if (json is Map<String, dynamic>) {
      return json['pt-br'] as String? ?? '';
    } else if (json is String) {
      return json;
    } else {
      return '';
    }
  }

  Map<String, dynamic> toJson() => _$TitleToJson(this);
  factory Title.fromJson(Map<String, dynamic> json) => _$TitleFromJson(json);
}
