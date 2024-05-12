import 'package:json_annotation/json_annotation.dart';

part 'bio.g.dart';

@JsonSerializable()
class Bio {
  @JsonKey(fromJson: _bioFromJson,name: 'pt-br')
  String? ptBr;

  Bio({this.ptBr = ''});

  static String _bioFromJson(dynamic json) {
    if (json is Map<String, dynamic>) {
      return json['pt-br'] ??= '';
    } else if (json is String) {
      return json;
    } else {
      return '';
    }
  }

  factory Bio.fromJson(Map<String, dynamic> json) => _$BioFromJson(json);

  Map<String, dynamic> toJson() => _$BioToJson(this);
}
